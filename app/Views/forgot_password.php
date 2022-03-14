
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/favicons/favicon.ico">

    <title>Forgot Password</title>
    

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo base_url("static/styles/fontawesome/css/all.min.css")?>">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="<?php echo base_url("assets/login/css/style.css")?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/alertify/css/alertify.min.css")?>">

    <script src="<?php echo base_url("assets/alertify/alertify.min.js")?>"></script>

    <link rel="stylesheet" href="<?php echo base_url("assets/Alert/dist/sweetalert2.min.css")?>">
    <script src="<?php echo base_url("assets/Alert/dist/sweetalert2.all.min.js")?>"></script>
    <script src="<?php echo base_url("assets/Alert/dist/sweetalert2.min.js")?>"></script>

  </head>

  <body class="img js-fullheight" style="background-image:url(<?php echo base_url("assets/img/post-6.jpg")?>);background-size: cover;background-repeat: repeat;">
    <!-- <form class="form-signin"> -->


      <section class="ftco-section">
		<div class="container">
            <br><br>
			<div class="row justify-content-center">
				<h1 class="heading-section">Forgot Password</h1>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-7">
					<div class="login-wrap p-0">
                    
						<h5 class="mb-4 text-center" style="color:white">Change my Password</h5>
                        <form id="form" action = "<?= base_url('Forgot/change')?>" method="post">
                        
                            <?php if ($message) : ?>
                            
                                <div class="alert alert-danger" role="alert">
                                    <strong>Password Unchanged!</strong> 
                                    <br>
                                    <span><?= $message ;?></span>
                                </div>

                            <?php endif ?>

                            <div class="row">

                                <div class="col">
                                    <!-- Email -->
                                    <div>
                                    <input style="font-size:20px;" id="mail" onkeyup="emailValidation()" type="text" name="email" class="email form-control" placeholder="Your email" autofocus>
                                    <span id="stat"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <!-- Email -->
                                    <div>
                                    <input style="font-size:20px;" max="9999" id="number" type="number" name="codeConf" class="codeConf form-control" placeholder="Your Code" autofocus>
                                    <span id="stat"></span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <!-- New Password -->
                                    <div class="form-group">
                                    <input style="font-size:20px;" onkeyup="passwordValidation()" id="password-field" name="newPassword" type="password" class="newPassword form-control" placeholder="New Password">
                                    <span id="textN"></span>
                                    </div>
                                </div>
                            
                                <div class="col">
                                    <!-- Confirm Password -->
                                    <div class="form-group">
                                    <input style="font-size:20px;" onkeyup="passwordConfirm()" id="confPassword" name="confPassword" type="password" class="confPassword form-control" placeholder="Confirm Password">
                                    <span id="textC" ></span>
                                    </div>
                                </div>

                            </div>
                        
                            <center>
                            <div style="width: 200px;">
                                <button class="button btn btn-lg btn-success btn-block" name="save" type="submit">Send</button>
                                <center><a href="<?php echo base_url('/'); ?>">&mdash; Return to Login Page &mdash;</a></center>
                            </div>             
                            </center>

                        </form>
                        <!-- </form> -->

                    </div>
                </div>
            </div>
        </div>
      </section>


      <!-- FIN DU GESTION D'ERREUR EN JS -->
    <script src="<?php echo base_url("assets/login/validationForgot.js")?>"></script>
    
    <script src="<?php echo base_url("assets/login/js/jquery.min.js")?>"></script>
    <script src="<?php echo base_url("assets/login/js/popper.js")?>"></script>
    <script src="<?php echo base_url("assets/login/js/bootstrap.min.js")?>"></script>
    <script src="<?php echo base_url("assets/login/js/main.js")?>"></script>
	</body>
</html>
