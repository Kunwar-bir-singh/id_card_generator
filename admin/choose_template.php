<?php require_once('../config.php'); ?>
<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">

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

	#generateButton {
		margin-bottom: 5px;
	}

	.modal {
		display: none;
		position: fixed;
		z-index: 1;
		padding-top: 50px;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		overflow: auto;
		background-color: rgb(0, 0, 0);
		background-color: rgba(0, 0, 0, 0.8);
	}

	.modal-content {
		background-color: #fefefe;
		/* margin: auto; */
		padding: 10px;
		border: 1px solid #888;
		width: 80%;
		margin-left: 19%;
		margin-top: 2%;
	}


	.close {

		display: inline-block;
		color: #aaa;
		font-size: 28px;
		font-weight: bold;
		width: 30px;
		/* Set a specific width */
		text-align: center;
		/* Center the content horizontally */
	}

	.close:hover,
	.close:focus {
		color: black;
		text-decoration: none;
		cursor: pointer;
	}

	h2 {
		display: flex;
		align-items: center;
		justify-content: center;
		font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		font-size: 40px;
	}

	.templates_heading {
		background: #481CFF;
		background: linear-gradient(to right, #481CFF 0%, #18FFEE 100%);
		-webkit-background-clip: text;
		-webkit-text-fill-color: transparent;
		font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
		font-size: 3.5em;
	}

	#imageGallery {
		display: flex;
		justify-content: center;
		align-items: center;
		flex-wrap: wrap;
		flex-direction: row;

	}

	.potrait {
		display: flex;
		flex-direction: row;
		flex-wrap: wrap;
		justify-content: center;
		align-items: center;
	}

	.landscape {
		display: flex;
		flex-direction: row;
		flex-wrap: wrap;
		justify-content: center;
		align-items: center;
	}

	.image-item {
		margin: 5px;
		display: flex;
		flex-direction: column;
	}

	.image-item img {
		width: 50mm;
		height: 85mm;
		border: 1px solid black;
	}

	.image-item-horizontal {
		margin: 5px;
		display: flex;
		flex-direction: column;
		position: relative;
	}

	.image-item-horizontal img {
		width: 85mm;
		height: 50mm;
		border: 1px solid black;
	}

	.image-item input[type=radio] {
		margin-top: 10px;
		height: 20px;
	}

	.image-item-horizontal input[type=radio] {
		margin-top: 10px;
		height: 20px;
	}

	.checkbox-item {
		margin-top: 10px;
	}

	#submitBtn {
		width: 173px;
    height: 40px;
    background: #25d170;
    border-radius: 999px;
    box-shadow: #5E5DF0 0 10px 20px -10px;
    box-sizing: border-box;
    color: #FFFFFF;
    cursor: pointer;
    font-family: Inter, Helvetica, "Apple Color Emoji", "Segoe UI Emoji", NotoColorEmoji, "Noto Color Emoji", "Segoe UI Symbol", "Android Emoji", EmojiSymbols, -apple-system, system-ui, "Segoe UI", Roboto, "Helvetica Neue", "Noto Sans", sans-serif;
    font-size: 21px;
    font-weight: 700;
    line-height: 24px;
    opacity: 1;
    outline: 0 solid transparent;
    padding: 8px 18px;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    width: fit-content;
    word-break: break-word;
    border: 0;
	}

	#landscape_heading {
		margin-top: 25px;
	}


	@media (max-width: 478px) {

		#classes_list {
			width: 110vw;
		}
	}
</style>
<?php require_once('inc/header.php') ?>

<body class="sidebar-mini layout-fixed control-sidebar-slide-open layout-navbar-fixed sidebar-mini-md sidebar-mini-xs text-sm" data-new-gr-c-s-check-loaded="14.991.0" data-gr-ext-installed="" style="height: auto;">
	<div class="wrapper">
		<?php require_once('inc/topBarNav.php') ?>


		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper  pt-3" style="min-height: 567.854px; margin: 0;">

			<!-- Main content -->
			<section class="content  text-dark">
				<div class="container-fluid">

					<h2 class="templates_heading">Portrait Templates</h2>
					<div id="imageGallery">
						<div class="potrait">
							<div class="image-item ">
								<img src="school/id_cards_pdf/main/template_images/1.png" alt="template1" srcset="">
								<input type="radio" name="template" id="1">
							</div>
							<div class="image-item ">
								<img src="school/id_cards_pdf/main/template_images/2.png" alt="template1" srcset="">
								<input type="radio" name="template" id="2">
							</div>
							<div class="image-item ">
								<img src="school/id_cards_pdf/main/template_images/3.png" alt="template1" srcset="">
								<input type="radio" name="template" id="3">
							</div>
							<div class="image-item ">
								<img src="school/id_cards_pdf/main/template_images/4.png" alt="template1" srcset="">
								<input type="radio" name="template" id="4">
							</div>
							<div class="image-item ">
								<img src="school/id_cards_pdf/main/template_images/5.png" alt="template1" srcset="">
								<input type="radio" name="template" id="5">
							</div>
							<div class="image-item ">
								<img src="school/id_cards_pdf/main/template_images/6.png" alt="template1" srcset="">
								<input type="radio" name="template" id="6">
							</div>
							<div class="image-item ">
								<img src="school/id_cards_pdf/main/template_images/7.png" alt="template1" srcset="">
								<input type="radio" name="template" id="7">
							</div>
							<div class="image-item ">
								<img src="school/id_cards_pdf/main/template_images/8.png" alt="template1" srcset="">
								<input type="radio" name="template" id="8">
							</div>
							<div class="image-item ">
								<img src="school/id_cards_pdf/main/template_images/9.png" alt="template1" srcset="">
								<input type="radio" name="template" id="9">
							</div>
							<div class="image-item ">
								<img src="school/id_cards_pdf/main/template_images/10.png" alt="template1" srcset="">
								<input type="radio" name="template" id="10">
							</div>
						</div>
						<h2 class="templates_heading">Landscape Templates</h2>
						<div class="landscape">
							<div class="image-item-horizontal">
								<img src="school/id_cards_pdf/main/template_images/h1.png" alt="template1" srcset="">
								<input type="radio" name="template" id="h1">
							</div>
							<div class="image-item-horizontal">
								<img src="school/id_cards_pdf/main/template_images/h2.png" alt="template1" srcset="">
								<input type="radio" name="template" id="h2">
							</div>
							<div class="image-item-horizontal">
								<img src="school/id_cards_pdf/main/template_images/h3.png" alt="template1" srcset="">
								<input type="radio" name="template" id="h3">
							</div>
							<div class="image-item-horizontal">
								<img src="school/id_cards_pdf/main/template_images/h4.png" alt="template1" srcset="">
								<input type="radio" name="template" id="h4">
							</div>
							<div class="image-item-horizontal">
								<img src="school/id_cards_pdf/main/template_images/h5.png" alt="template1" srcset="">
								<input type="radio" name="template" id="h5">
							</div>
						</div>

					</div>

					<form action="./school/id_cards_pdf/main/template_1.php" method="POST">
						<input type="hidden" name="school_id" value="<?php echo $_POST['school_id']; ?>" />
						<input type="hidden" name="class" value="<?php echo $_POST['class']; ?>" />
						<input type="hidden" name="chosen_template" id="chosen_template" value="1" />

						<button onclick="selectTemplate(event)" id="submitBtn">Submit</button>

					</form>

				</div>
			</section>
			<!-- /.content -->

			<!-- /.content-wrapper -->
			<?php require_once('inc/footer.php') ?>
			<script>
				document.querySelectorAll('.openModalBtn').forEach(button => {
					button.addEventListener('click', function(event) {
						event.preventDefault();
						const row = this.closest('tr');
						const rowIndex = Array.from(row.parentElement.children).indexOf(row);
						showModal(rowIndex);
					});
				});

				function selectTemplate(event) {
					const formElement = document.getElementById('chosen_template');

					let chosenTemplate = document.querySelector('input[name="template"]:checked').id;
					formElement.value = chosenTemplate;
					// event.preventDefault();
				}
			</script>
</body>

</html>