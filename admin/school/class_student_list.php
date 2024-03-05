<style>
    .img-template {
        height: 30vh;
        background: #000000b8;
        object-fit: scale-down;
        object-position: center center;
    }

    .delete_template {
        position: relative;
        z-index: 2;
    }
</style>
<?php
// Assuming $conn is your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_student_data"]) && $_POST["update_student_data"] == "update_student_data") {
    $admissionNo = $_POST["student_id"];
    $names = $_POST["names"];
    $class = $_POST["class"];
    $dateOfBirth = $_POST["date_of_birth"];
    $fatherName = $_POST["father_name"];
    $motherName = $_POST["mother_name"];
    $contactNo = $_POST["contact_no"];
    $address = $_POST["address"];

    // Update the data in the database
    $updateQuery = "UPDATE `student_data` SET
        `names` = '$names',
        `class` = '$class',
        `date_of_birth` = '$dateOfBirth',
        `father_name` = '$fatherName',
        `mother_name` = '$motherName',
        `contact_no` = '$contactNo',
        `address` = '$address'
        WHERE `id` = '$admissionNo'";

    if ($conn->query($updateQuery) === TRUE) {
        echo "Data updated successfully.";
    } else {
        echo "Error updating data: " . $conn->error;
    }
}

// File upload handling
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["photo_check"]) && $_POST["photo_check"] == "photo_check") {
    // Check if the file was uploaded without errors
    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
        $targetDir = "../uploads/S_photos/"; // Directory where uploaded files will be saved
        $originalFileName = basename($_FILES["photo"]["name"]);
        $timestamp = $_POST['student_id'];
        $newFileName = $timestamp . '_' . time() . '_' . $originalFileName;
        $targetFile = $targetDir . $newFileName;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        //echo $imageFileType."type";
        // Check if the file is an image
        if (getimagesize($_FILES["photo"]["tmp_name"]) === false) {
            echo "Error: File is not an image.";
            $uploadOk = 0;
        }

        // Check if the file already exists
        if (file_exists($targetFile)) {
            echo "Error: File already exists.";
            $uploadOk = 0;
        }

        // // Check file size (adjust as needed)
        // if ($_FILES["photo"]["size"] > 200000) {
        //     echo "Error: File is too large.";
        //     $uploadOk = 0;
        // }

        // Allow only certain file formats (you can adjust/add more formats)
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Error: Only JPG, JPEG, PNG, and GIF files are allowed.";
            $uploadOk = 0;
        }

        // If $uploadOk is set to 0, an error occurred
        if ($uploadOk == 0) {
            echo "Error: Your file was not uploaded.";
        } else {
            // Move the file to the target directory
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
                echo "The file " . htmlspecialchars(basename($_FILES["photo"]["name"])) . " has been uploaded.";

                // Insert file name into the database
                $fileName = basename($_FILES["photo"]["name"]);
                $sql = "update student_data set photo_name='" . $newFileName . "' where id='" . $_POST['student_id'] . "';";

                if ($conn->query($sql) === TRUE) {
                    echo " File name inserted into database successfully.";
                } else {
                    echo " Error inserting file name into database: " . $conn->error;
                }
                //Code For Re-Sizing The Image
                $uploadedImage = imagecreatefromstring(file_get_contents($targetFile)); // Load the uploaded image
                $width = imagesx($uploadedImage);
                $height = imagesy($uploadedImage);
                $newWidth = $width / 2; // Resize to half of the original width
                $newHeight = $height / 2; // Resize to half of the original height
                $resizedImage = imagescale($uploadedImage, $newWidth, $newHeight); // Resize the image

                // Save the resized image in the same directory with the same filename as the original one
                imagejpeg($resizedImage, $targetFile); // Save the resized image as JPEG (change file type if necessary)

                // Free up memory
                imagedestroy($uploadedImage);
                imagedestroy($resizedImage);
            } else {
                echo "Error: There was an issue moving the file.";
            }
        }
    } else {
        echo "Error: No file uploaded.";
    }
    //continue;
}

?>

<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">List of Students ( <?php echo $_POST['class']; ?>)</h3>
        <div class="card-tools">
            <!--	<a href="?page=generate" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>-->
        </div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <div class="row row-cols-3 gx-3">
                <?php

                //$qry = $conn->query("SELECT * FROM `generated_id` order by `name` asc");
                $qry = $conn->query("SELECT *  FROM `student_data` WHERE `school_id` = '" . $_POST['school_id'] . "' and `class` = '" . $_POST['class'] . "' order by admission_no ASC; ");
                echo "<table class='table table-bordered table-stripped'>
			 <tr><th> Admission No. </th><th>Names</th><th>Class</th><th>Date of Birth</th><th>Father Name</th><th> Mother Name</th><th>Contact No.</th><th>Address</th><th>Photo</th><th>Upload Photo</th><th>Action</th></tr>   ";
                while ($row = $qry->fetch_assoc()) :
                    $qry_count = $conn->query("SELECT *  FROM `student_data` WHERE `admission_no` = '" . $row['admission_no'] . "' and `school_id` = '" . $_POST['school_id'] . "' and photo_name IS NULL; ");
                    //echo "SELECT *  FROM `student_data` WHERE `admission_no` = '".$row['admission_no']."' and `school_id` = '".$_POST['school_id']."' and photo_name IS NULL";

                    $count_rows = $qry_count->num_rows;
                    if ($count_rows == 0) {
                        $photo_available = 'Available';
                    } else {
                        $photo_available = 'NA';
                    }
                ?>
                    <?php echo "<tr><td> " . $row['admission_no'] . "  </td><td> " . $row['names'] . "  </td><td> " . $row['class'] . "  </td><td> " . $row['date_of_birth'] . "  </td><td> " . $row['father_name'] . "  </td><td> " . $row['mother_name'] . "  </td><td> " . $row['contact_no'] . "  </td><td> " . $row['address'] . "  </td><td>" . $photo_available . "</td>"  ?>
                    <td>
                        <form action="?page=school/class_student_list" id="class_student_list" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="student_id" value="<?php echo $row['id'] ?>">
                            <input type="hidden" name="school_id" value="<?php echo $_POST['school_id'] ?>">
                            <input type="hidden" name="class" value="<?php echo $_POST['class'] ?>">
                            <input type="hidden" name="photo_check" value="photo_check">
                            <input type="file" name="photo" id="photo" accept="image/*" required>
                            <input type="submit" class="btn btn-sm btn-primary" value="Upload Photo" />
                        </form>
                    </td>
                    <td>
                        <form action="?page=school/edit_student" id="edit_student" method="post">
                            <input type="hidden" name="school_id" value="<?php echo $_POST['school_id'] ?>">
                            <input type="hidden" name="class" value="<?php echo $_POST['class'] ?>">

                            <input type="hidden" name="student_id" value="<?php echo $row['id'] ?>">
                            <input type="submit" class="btn btn-sm btn-primary" value="Edit " />
                        </form>
                    </td>
                    </tr>
                <?php endwhile; ?>
                </table>
            </div>
        </div>
    </div>
</div>