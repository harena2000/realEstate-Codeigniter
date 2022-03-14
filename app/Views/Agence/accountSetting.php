
<main id="main">

<?php if ($message) : ?>
  <script>

    Swal.fire({
      icon: 'info',
      title: 'Information',
      
      text: '<?= $message ?>',
    })

  </script>
<?php endif ?>

<?php if ($error) : ?>
  <script>

    Swal.fire({
      icon: 'error',
      title: 'Unchanged!',
      
      text: '<?= $error ?>',
    })

  </script>
<?php endif ?>

<?php if ($success) : ?>
  <script>

    Swal.fire({
      icon: 'success',
      title: 'Changed!',
      
      text: '<?= $success ?>',
    })

  </script>
<?php endif ?>

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Account Setting</h1>
              <span class="color-text-a">Change account information</span>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

   <section class="news-single nav-arrow-b">
       <div class="container">
           <div class="row">
                <div class="form-comments">
                    <form class="form-a" id="form1">
                        <h5><label for="inputEmail1">Change Email Account</label></h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <input onkeyup="validEmail()" type="email" name="emailCurrent" id="emailCurrent" class="form-control form-control-lg form-control-a" placeholder="Email *" required>
                                    <small id="stat"></small>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <button disabled onclick="sendPassword()" id="changeButton" type="button" name="change" class="btn btn-a">Change</button>                                
                                </div>
                            </div>
                        </div>
                    </form>
                    <br>
                    <form class="form-a" id="form2" action="<?= base_url("Agence/Profil/changePassword/") ?>" method="POST">
                        <h5><label for="inputEmail1">Change Password</label></h5>
                        <div class="row">
                            <div class="col-md-7 mb-3">
                                <div class="form-group">
                                    <label onkeyup="lastPassword()" for="inputUrl">Enter Current Password</label>
                                    <input name="lastPassword" type="password" class="form-control form-control-lg form-control-a" id="lastPassword" placeholder="Type the lastest password" required>
                                    <small id="textL"></small>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="inputName">Enter new Password</label>
                                    <input onkeyup="newPasswordValidation()" name="newPassword" type="password" class="form-control form-control-lg form-control-a" id="newPassword" placeholder="New Password *" required>
                                    <small id="textN"></small>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="inputEmail1">Confirm password</label>
                                    <input onkeyup="confPasswordValidation()" name="confPassword" type="password" class="form-control form-control-lg form-control-a" id="confPassword" placeholder="Confirm Password *" required>
                                    <small id="textConf"></small>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <button disabled type="submit" class="btn btn-a" id="saveButton">Save</button>                                
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
           </div>
       </div>
   </section>

    <script type="text/javascript">

        function sendPassword() {
            let email = document.getElementById("emailCurrent")
            Swal.fire({
                title: 'Enter your Password!',
                input: 'password',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                inputLabel: 'Password',
                inputPlaceholder: 'Enter your password',
                // showCancelButton: true,
                confirmButtonText: 'Enter',
                showLoaderOnConfirm: true,
                preConfirm: (password) => {
                    if (password != "") {
                        return fetch(location.href = "<?= base_url("Agence/Profil/changeMail/") ?>" + "/" + email.value + "/" + password)
                    }
                    else
                    {
                        Swal.showValidationMessage("Type your password")
                    }
                },

                allowOutsideClick: () => !Swal.isLoading()
                }).then((result) => {
                    if (result.isConfirmed) {
                        const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })
                    }
                })
        }

        function validEmail() {

            let form = document.getElementById('form1');
            let email = document.getElementById('emailCurrent');
            let emailB = document.getElementById('emailCurrent');
            let stat = document.getElementById('stat');
            let changeButton = document.getElementById('changeButton');

            let pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

            if (email.value.match(pattern)) {
                form.classList.add("Valid");
                form.classList.remove("Invalid");
                stat.innerHTML = "Valid Email";
                emailB.style.borderColor = "#00ff00";
                stat.style.Color = "#00ff00";

                changeButton.disabled = false;

            } else {
                form.classList.remove("Invalid");
                form.classList.add("Valid");
                stat.innerHTML = "Not in a valid format";
                emailB.style.borderColor = "#ff0000";
                stat.style.Color = "#ff0000";

                changeButton.disabled = true;

            }
        }

        function newPasswordValidation() {
            let form = document.getElementById('form2');
            let newPass = document.getElementById('newPassword').value;
            let newBorder = document.getElementById('newPassword');
            let textNew = document.getElementById('textN');

            if (newPass.length >= 6) {
                form.classList.add("Valid");
                form.classList.remove("Invalid");
                newBorder.style.borderColor = "#00ff00";
                textNew.innerHTML = "Strength";
                textNew.style.Color = "#00ff00";
            }
            else if (newPass.length < 6) {
                form.classList.remove("Invalid");
                form.classList.add("Valid");
                newBorder.style.borderColor = "#ff0000";
                textNew.innerHTML = "Put a Longer password (more than 6 character)";
                textNew.style.Color = "#ff0000";
                
                saveButton.disabled = true;
            }
        }

        function confPasswordValidation() {
            let form = document.getElementById('form2');
            let newPass = document.getElementById('newPassword').value;
            let confPass = document.getElementById('confPassword').value;
            let newBorder = document.getElementById('confPassword');
            let textNew = document.getElementById('textConf');
            let saveButton = document.getElementById("saveButton")

            if (confPass == newPass) {
                form.classList.add("Valid");
                form.classList.remove("Invalid");
                newBorder.style.borderColor = "#00ff00";
                textNew.innerHTML = "Good Job";
                textNew.style.Color = "#00ff00";

                saveButton.disabled = false;
            }
            else if (confPass != newPass) {
                form.classList.remove("Invalid");
                form.classList.add("Valid");
                newBorder.style.borderColor = "#ff0000";
                textNew.innerHTML = "Incorrect password";
                textNew.style.Color = "#ff0000";

                saveButton.disabled = true;
            }
        }

        function lastPassword() {
            let form = document.getElementById('form2');
            let newPass = document.getElementById('lastPassword').value;
            let newBorder = document.getElementById('lastPassword');
            let textNew = document.getElementById('textL');
            let saveButton = document.getElementById("saveButton")
            
            if (newPass == "") {
                form.classList.remove("Invalid");
                form.classList.add("Valid");
                newBorder.style.borderColor = "#ff0000";
                textNew.innerHTML = "Enter your current password";
                textNew.style.Color = "#ff0000";

                saveButton.disabled = true;
            }
        }

    </script>

  </main><!-- End #main -->

  