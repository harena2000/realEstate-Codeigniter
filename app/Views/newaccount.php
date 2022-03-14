
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/favicons/favicon.ico">

    <title>Sign up</title>
    

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo base_url("static/styles/fontawesome/css/all.min.css")?>">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="<?php echo base_url("assets/login/css/style.css")?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/alertify/css/alertify.min.css")?>">

    <script src="<?php echo base_url("assets/alertify/alertify.min.js")?>"></script>
    <script src="<?php echo base_url("assets/cleave.js")?>"></script>
    <script src="<?php echo base_url("assets/cleave-phone.i18n.js")?>"></script>

  </head>

  <body class="img js-fullheight" style="background-image:url(<?php echo base_url("assets/img/post-6.jpg")?>);background-size: cover;background-repeat: repeat;">
    <!-- <form class="form-signin"> -->

    <div class="container">

      <section >
        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-7">
            <div class="login-wrap p-0">
              <h3 class="mb-4 text-center">Client Account</h3>

              <!-- Formulaire -->

              <form id="form" action = "<?= base_url('Signup')?>" method="post">
              
                <div class="row">
                  <div class="col">
                    <!-- Name -->
                      <input type="text" name="name" class="name form-control" placeholder="Last Name" autofocus>
                  </div>

                  <div class="col">
                    <!-- First Name -->
                      <input type="text" name="firstName" class="form-control" placeholder="Your First Name" autofocus>
                  </div>

                </div>


                <br>
                <div class="row">
                    <!-- Sexe -->
                  <div class="col">
                    <select name="sexe" class="sexe form-control">
                      <option selected value="empty">Gender</option>
                      <option style="color: black;" value="0">Homme</option>
                      <option style="color: black;" value="1">Femme</option>
                    </select>
                  </div>
                  
                  <div class="col">
                    <input type="date" name="dateNaissance" class="dateNaissance form-control" placeholder="Your birthday" max="2000-11-25">
                  </div>
                </div>


                <br>
                <div class="row">
                  <div class="col">
                    <!-- lIEU NAISSANCE -->
                      <input type="text" name="lieuNaissance" class="lieuNaissance form-control" placeholder="Where you are born ?" autofocus>
                  </div>

                  <!-- Adresse -->
                  <div class="col">
                    <input type="text" name="adresse" class="adresse form-control" placeholder="Your Adresse" autofocus>
                  </div>
                </div>

                <br>
                <div class="row">
                  <!-- Ville -->
                  <div class="col">
                    <input type="text" name="ville" class="ville form-control" placeholder="Your City" autofocus>
                  </div>

                  <div class="col">
                    <!-- Pays -->
                    <select name="pays" class="pays form-control">
                      <?php foreach ($pays as $nation) : ?>

                        <option style="color: black;" value="<?= $nation->idPays ;?>"><?= $nation->nomPays ;?></option>

                      <?php endforeach ?>
                    </select>
                  </div>
                </div>


                <br>
                <div class="row">
                  <!-- Profession -->
                  <div class="col">
                    <input type="text" placeholder="Your Profession" name="profession" class="profession form-control" autofocus>
                  </div>

                  <div class="col">
                    <!-- Status -->
                    <select name="status" class="status form-control">
                      <option selected value="empty">Situation</option>
                      <option style="color: black;" value="Single">Single</option>
                      <option style="color: black;" value="Married">Married</option>
                    </select>
                  </div>
                </div>


                <br>
                <div class="row">

                 <div class="col">
                    <!-- Email -->
                    <div>
                      <input id="mail" onkeyup="emailValidation()" type="text" name="email" class="email form-control" placeholder="Your email" autofocus>
                      <span id="stat"></span>
                    </div>
                  </div>

                  <div class="col">
                    <!-- Contact -->
                      <input type="text" onkeypress="isInputNumber(event)" name="contact" class="contact form-control" placeholder="Your Phone Number" autofocus>
                  </div>
                </div>

                <br>

                <div class="row">
                  <div class="col">
                    <!-- New Password -->
                    <div class="form-group">
                      <input onkeyup="passwordValidation()" id="password-field" name="newPassword" type="password" class="newPassword form-control" placeholder="New Password">
                      <span id="textN"></span>
                    </div>
                  </div>
                  
                  <div class="col">
                    <!-- Confirm Password -->
                    <div class="form-group">
                      <input onkeyup="passwordConfirm()" id="confPassword" name="confPassword" type="password" class="confPassword form-control" placeholder="Confirm Password">
                      <span id="textC" ></span>
                    </div>
                  </div>
                  
                  <div class="col">
                    <!-- Confirm Password -->
                    <div class="form-group">
                      <input max="9999" onkeyup="codeConfirmation()" id="codeConf" name="codeConf" type="number" class="codeConf form-control" placeholder="Confirmation code">
                      <span id="textCode" ></span>
                    </div>
                  </div>

                </div>
            
                <center>
                  <div style="width: 200px;">
                    <button class="button btn btn-lg btn-success btn-block" name="save" type="submit">Save</button>
                    <center><a href="<?php echo base_url('/'); ?>">I have already an account</a></center>
                  </div>             
                </center>

              </form>
              <!-- </form> -->

            </div>
          </div>
        </div>
      </section>

    </div>


      <!-- FIN DU GESTION D'ERREUR EN JS -->
    <script src="<?php echo base_url("assets/login/validation.js")?>"></script>
    
    <script src="<?php echo base_url("assets/login/js/jquery.min.js")?>"></script>
    <script src="<?php echo base_url("assets/login/js/popper.js")?>"></script>
    <script src="<?php echo base_url("assets/login/js/bootstrap.min.js")?>"></script>
    <script src="<?php echo base_url("assets/login/js/main.js")?>"></script>
	</body>
</html>
