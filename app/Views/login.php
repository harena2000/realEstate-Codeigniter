
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/assets/img/favicon.ico">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="static/styles/fontawesome/css/all.min.css">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="assets/login/css/style.css">
  
	<link rel="stylesheet" href="<?php echo base_url("assets/Alert/dist/sweetalert2.min.css")?>">
  	<script src="<?php echo base_url("assets/Alert/dist/sweetalert2.all.min.js")?>"></script>
  	<script src="<?php echo base_url("assets/Alert/dist/sweetalert2.min.js")?>"></script>

  </head>

  <body class="img js-fullheight" style="background-image:url(assets/img/post-6.jpg)">
    <!-- <form class="form-signin"> -->

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-4">
					<h2 class="heading-section">RealEstate</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
						<h3 class="mb-4 text-center">Login</h3>

						<?php echo form_open('Login/identified') ?>

							<?php if ($error) : ?>
								<div class="alert alert-danger"><?= $error ;?></div>
							<?php endif ?>

							<?php if ($success) : ?>
								<div class="alert alert-success"><?= $success ;?></div>
							<?php endif ?>

							<div class="form-group">
								<input type="mail" name="email" class="form-control" placeholder="Your email" required>
							</div>
							<div class="form-group">
								<input id="password-field" name="password" type="password" class="form-control" placeholder="Password" required>
								<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
							</div>
							<div class="form-group">
								<button type="submit" class="form-control btn btn-primary submit px-3">Connection</button>
							</div>
		
						<?php echo form_close(); ?>

						<p class="w-100 text-center">&mdash; <a href="#" id="createAccount"> Create account</a> &mdash;
						 <a href="<?= base_url("Forgot") ;?>"> Forgot Password ?</a> &mdash;</p>

					</div>
				</div>
			</div>
		</div>
	</section>
	<script>

		let createAccount = document.getElementById("createAccount")

		createAccount.addEventListener("click", () => {
			Swal.fire({
				title: 'Account Type!!!',
				text: "Choose the type of your account!!!",
				icon: 'info',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: 'green',
				confirmButtonText: 'Client',
				cancelButtonText: 'Agents'
			}).then((result) => {
				if (!result.isConfirmed) {
					location.href = "<?=  base_url("/Newaccount/agence") ?>"
				}
				else
					location.href = "<?=  base_url("/Newaccount") ?>"
			})
		})
		

	</script>

    </body>

  </html>
