
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

<script href="<?= base_url("assets/crop/bootstrap.min.js") ;?>" rel="stylesheet"></script>
  <link rel="stylesheet" href="<?= base_url("assets/crop/croppie.css") ;?>">
  <script src="<?= base_url("assets/crop/jquery-3.5.1.slim.min.js") ;?>"></script>  
  <script src="<?= base_url("assets/crop/jquery-3.5.1.min.js") ;?>"></script>  
  <script src="<?= base_url("assets/crop/croppie.js") ;?>"></script>

<!-- ======= Intro Single ======= -->
<section class="intro-single">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-8">
        <div class="title-single-box">
          <h1 class="title-single"><?php echo $liste->prenomClient?></h1>
          <span class="color-text-a"><?php echo $liste->emailUser . " : " . $liste->contactClient;?></span>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Intro Single -->

<!-- ======= Information about the User ======= -->
<section class="agent-single">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="row">
          <div class="col-md-4">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
                <img src="
                  <?php 
                    if ($liste->pdpUser == null) {
                      $avatar = ($liste->sexe == 0) ? 
                        base_url('assets/img/User/avatar-male.jpg') : base_url('assets/img/User/avatar-female.jpg') ;
                        echo $avatar;
                    } 
                    else {
                      echo base_url('assets/img/User/'.$liste->pdpUser);
                    }
                    
                    
                  ?>" id="uploaded_image" class="img-a img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <a href="#">
                        <br /> </a>
                    </h2>
                  </div>
                  <div class="card-footer-a">
                    <ul class="card-info d-flex justify-content-around">
                      <li>
                        <center>

                          <button name="editInfo" type="button" class="btn btn-block" data-toggle="modal" data-target="#pdpChange">
                            <i style="font-size: 40px;" class="fas fa-camera" aria-hidden="true"></i>
                          </button>
                          
                        </center>
                        <br>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-5 section-md-t3">
            <div class="agent-info-box">
              <div class="agent-title">
                <div class="title-box-d">
                  <h3 class="title-d"><?php echo $liste->prenomClient
                    ."<br>". $liste->nomClient;?>
                  </h3>
                </div>
              </div>
              <div class="agent-content mb-3">
                <div class="info-agents color-a">
                  
                  <div class="row">
                    <div class="col">
                      <p>
                        <strong>Name: </strong>
                        <span class="color-text-a"> <?php echo $liste->nomClient;?> </span>
                      </p>
                      <p>
                        <strong>First Name: </strong>
                        <span class="color-text-a"> <?php echo $liste->prenomClient;?> </span>
                      </p>
                      <p>
                        <strong>Sexe: </strong>
                        <span class="color-text-a"> 
                            <?php $sex = ($liste->sexe == 0) ? "Men" : "Women" ;
                            echo $sex ;?>
                        </span>
                      </p>
                      <p>
                        <strong>Adresse: </strong>
                        <span class="color-text-a"> <?php echo $liste->adresse;?> </span>
                      </p>
                      <p>
                        <strong>Birthday: </strong>
                        <span class="color-text-a"> <?php echo $liste->dateNaissanceClient;?> </span>
                      </p>
                    </div>
                    <div class="col">
                      <p>
                        <strong>City: </strong>
                        <span class="color-text-a"> <?php echo $liste->ville;?> </span>
                      </p>
                      <p>
                        <strong>Country: </strong>
                        <span class="color-text-a"> <?php echo $liste->nomPays;?> </span>
                      </p>
                      <p>
                        <strong>State: </strong>
                        <span class="color-text-a"> <?= $select = $liste->status == 0 ? "Single" : "Married";?> </span>
                      </p>
                      <p>
                        <strong>Profession: </strong>
                        <span class="color-text-a"> <?php echo $liste->profession;?></span>
                      </p>
                      <p>
                        <strong>Born in: </strong>
                        <span class="color-text-a"> <?php echo $liste->lieuNaissanceClient;?> </span>
                      </p>
                    </div>
                  </div>

                  <div>
                    <!-- Modal of Change Profil-->
                    <div class="modal fade" id="pdpChange" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div style="width: 800px; margin-left : -150px" class="modal-content">
                            <br>
                              <div style="margin-left: 50px;" class="modal-header">
                                <!-- <h3 class="modal-title" id="exampleModalLabel">Edit Profil</h3> -->
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body" style="margin-top:-50px">

                                <div class="row">
                                  <div class="col-md-4 text-center" style="padding-top:30px;">
                                    <div id="upload-input" style="width:450px; height: 500px;"></div>
                                  </div>
                                  <div class="col-md-6" style="padding-top:30px;">
                                    <strong style="margin-left:200px">Select Image:</strong>
                                    <br>
                                    <input type="file" id="upload" style="margin-left:200px">
                                    <br><br>
                                    <button disabled id="uploadButton" style="margin-left:200px" class="btn btn-success upload-result">Upload Image</button>
                                  </div>
                                </div>

                              </div>
                              <br><br>
                            </div>
                        </div>
                    </div>

                     <!-- Modal Edit Information -->
                     <br>
                    <button name="editInfo" type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-edit"></i> Edit Information
                    </button>
                      <div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div style="width: 800px; margin-left : -150px" class="modal-content">
                            <br>
                              <div style="margin-left: 50px;" class="modal-header">
                                <h3 class="modal-title" id="exampleModalLabel">Edit Information</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">

                                <form id="form" action="<?= base_url("Client/edit");?>" method="post"> 
                                
                                <div class="row">
                                  <div class="col">
                                  
                                      <!-- Name -->
                                    <div>
                                      <label for="">Last Name</label>
                                      <input type="text" name="name" class="name form-control" placeholder="Family name"
                                      value="<?= $liste->nomClient ;?>" autofocus required >
                                    </div>
                                      <br>

                                      <!-- First Name -->
                                      <div>
                                        <label for="">First Name</label>
                                        <input type="text" name="firstName" class="form-control" placeholder="Your First Name" 
                                        value="<?= $liste->prenomClient ;?>" autofocus required >
                                      </div>
                                    
                                      <br>

                                      <!-- Sexe -->
                                      <div>
                                        <label for="">Gender</label>
                                        <select name="sexe" class="sexe form-control" required >
                                          <option value="empty">Gender</option>
                                          <option <?php $select = $liste->sexe == 0 ? "selected" : "" ; echo $select?> style="color: black;" value="0">Homme</option>
                                          <option <?php $select = $liste->sexe == 1 ? "selected" : "" ; echo $select?> style="color: black;" value="1">Femme</option>
                                        </select>
                                      </div>
                                      <br>

                                      <div>
                                        <label for="">Birthday</label>
                                        <input value="<?= $liste->dateNaissanceClient ;?>" type="date" name="dateNaissance" class="dateNaissance form-control" placeholder="Your birthday">
                                      </div>
                                      <br>
                                      <div>
                                        <label for="">Born in</label>
                                        <input value="<?= $liste->lieuNaissanceClient ;?>" type="text" name="lieuNaissance" class="lieuNaissance form-control" placeholder="Where you are born ?" autofocus>
                                      </div>
                                      <br>

                                      <!-- Adresse -->
                                      <div>
                                        <label for="">Adresse</label>
                                        <input type="text" name="adresse" class="adresse form-control" placeholder="Your Adresse"
                                        value="<?= $liste->adresse ;?>" autofocus required >
                                      </div>
                                    
                                      <br>
                                  </div>
                                  <div class="col">

                                  <!-- Ville -->
                                      <div>
                                        <label for="">City</label>
                                        <input type="text" name="ville" class="ville form-control" placeholder="Your City"
                                        value="<?= $liste->ville ;?>" autofocus required >
                                      </div>
                                    
                                      <br>

                                      <!-- Pays -->
                                      <div>
                                        <label for="">Country</label>
                                        <select name="pays" class="pays form-control">
                                          <?php foreach ($pays as $nation) : ?>

                                            <option <?= $select = $nation->idPays == $liste->pays ? "selected" : "" ;?> style="color: black;" value="<?= $nation->idPays ;?>"><?= $nation->nomPays ;?></option>

                                          <?php endforeach ?>
                                        </select>
                                      </div>

                                    <!-- Profession -->
                                    <br>
                                    <div>
                                      <label for="">Profession</label>
                                      <input type="text" name="profession" class="profession form-control" placeholder="Your Profession"
                                      value="<?= $liste->profession ;?>" autofocus required >
                                    </div>

                                    <br>

                                    <!-- Status -->
                                    <div>
                                      <label for="">State</label>
                                      <select name="status" class="status form-control" required >
                                        <option selected value="empty">Situation</option>
                                        <option <?php $select = $liste->status == 0 ? "selected" : "" ; echo $select?> style="color: black;" value="0">Single</option>
                                        <option <?php $select = $liste->status == 1 ? "selected" : "" ; echo $select?> style="color: black;" value="1">Married</option>
                                      </select>
                                      </div>
                                      <br>

                                        <!-- Contact -->
                                        <div>
                                          <label for="">Phone number</label>
                                          <input type="text" onkeypress="isInputNumber(event)" name="contact" class="contact form-control" placeholder="Your Phone Number"
                                          value="<?= $liste->contactClient ;?>" autofocus required >
                                        </div>
                                        <script>
                                          // Contact Number event
                                          function isInputNumber(evt){
                                                                        
                                            var ch = String.fromCharCode(evt.which);
                                                                                      
                                              if(!(/[0-9]/.test(ch))){
                                                evt.preventDefault();
                                              }
                                                                                      
                                            }
                                              var cleave = new Cleave('.contact',{
                                                phone:true,
                                                phoneRegionCode:'MG'
                                              });
                                        </script>                                   
                                        
                                        <br>
                                  
                                  </div>
                                
                                </div>
                                
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button class="button btn btn-lg btn-success" name="save" type="submit">Save changes</button>
                                </div>

                                </form>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>

                      <!-- End of Modal Edit Information -->

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- Modal Edit Information -->

<script type="text/javascript">

$uploadCrop = $('#upload-input').croppie({
    enableExif: true,
    viewport: {
        width: 350,
        height: 460,
        type: 'square'
    },
    boundary: {
        width: 400,
        height: 500
    }
});

let fileTypes = ['jpg', 'jpeg', 'png'];
let uploadButton = document.getElementById("uploadButton")

$('#upload').on('change', function () { 

    let reader = new FileReader();
    let file = this.files[0]; 
    let fileExt = file.type.split('/')[1]; 

    if (fileTypes.indexOf(fileExt) !== -1) {
        uploadButton.disabled = false
        reader.onload = function (e) {
            $uploadCrop.croppie('bind', {
                url: e.target.result
            }).then(function(){
                console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);
    } else {
        uploadButton.disabled = true
        uploadButton.disabled = true
        Swal.fire({
            icon: "error",
            title: 'File not supported! ',
            text: "Choose a correct File, [ .jpg, .jpeg, .png ]"
        })
    }
  
});


$('.upload-result').on('click', function (ev) {
	$uploadCrop.croppie('result', {
		type: 'canvas',
		size: 'viewport'
	}).then(function (response) {
		$.ajax({
      url: "<?= base_url("Client/Edit/uploadImage") ;?>",
      type: "POST",
      data: { "image" : response},
      success: function (data) { 
        if (data.success) {
          Swal.fire({
            icon: data.icon,
            title: 'Update Profil!',
            text: data.msg
          }).then((result) => {
            if (result.isConfirmed) {
              location.href = "<?= base_url("Client/Profil") ?>"
            }
          })
        }
      }
		});
	});
});
</script>

</section><!-- End Agent Single -->

<br><br>

</main><!-- End #main -->

