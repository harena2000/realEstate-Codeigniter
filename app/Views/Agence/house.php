<main id="main">

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
              <h1 class="title-single"><?= $proprety->nomMaison ;?></h1>
              <span class="color-text-a">

              <?php 
                $idMaison = "";
              if (isset($stats->statusMaison)) : ?>
                <a href="<?= base_url("Agence/Profilclient/index/".$stats->idClient)?>">
                  <?= "Bought by $stats->prenomClient " ." ". $stats->nomClient ;?>
                </a>
              <?php else : ?>
                  <?= "This House is not sold yet" ;?>
              <?php endif ?>
              </a>

              </span>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Property Single ======= -->
    <section class="property-single nav-arrow-b">
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
                <img src="<?= $image = ($proprety->imgMaison == "") ? base_url("assets/img/House/house.jpg") : base_url("assets/img/House/$proprety->idMaison/$proprety->imgMaison"); ?>" 
                class="img-a img-fluid">
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

          <!-- Modal of Change Profil-->
          <div class="modal fade" id="pdpChange" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div style="width: 950px; margin-left : -150px" class="modal-content">
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
                      <div id="upload-input" style="width:600px; height: 650px;"></div>
                    </div>
                    <div class="col" style="padding-top:30px;">
                      <strong style="margin-left:300px">Select Image:</strong>
                        <br>
                      <input type="file" id="upload" style="margin-left:300px">
                        <br><br>
                      <button disabled id="uploadButton" style="margin-left:300px" class="btn btn-success upload-result">Upload Image</button>
                    </div>
                  </div>

                </div>
                  <br><br>
              </div>
            </div>
          </div>
          <!-- Modal Edit Information -->

          <div class="col">
            <div class="row justify-content-between">
              <div class="col-md-9 col-lg-12 section-md-t3">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="title-box-d">
                      <h3 class="title-d">Property Description</h3>
                    </div>
                  </div>
                </div>
                <div class="property-description">
                  <p class="description color-text-a">
                    <?= $proprety->description ;?>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <br>
        <div class="row justify-content-between">
          <div class="col-md-5 col-lg-3">
            <div class="property-price d-flex justify-content-center foo">
              <div class="card-header-c d-flex">
                <div class="card-box-ico">
                  <span class="ion-money">Ar</span>
                </div>
                <div class="card-title-c align-self-center">
                  <h5 class="title-c"><?= number_format($proprety->prix);?></h5>
                </div>
              </div>
            </div>
            <div class="property-summary">
              <div class="row">
                <div class="col">
                  <div class="title-box-d section-t4">
                    <h3 class="title-d">Quick Summary</h3>
                  </div>
                </div>
              </div>
              <div class="summary-list">
                <ul class="list">
                  <li class="d-flex justify-content-between">
                    <strong>Property ID:</strong>
                    <span><?= $proprety->idMaison ;?></span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Location:</strong>
                    <span><?= $proprety->adresseMaison ;?></span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>City:</strong>
                    <span><?= $proprety->villeMaison ;?></span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Nation:</strong>
                    <span><?= $proprety->nomPays ;?></span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Status:</strong>
                    <span><?php $status = $proprety->statusMaison == 0 ? "For Sale" : "Sold"; 
                                echo $status ;?></span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Area:</strong>
                    <span><?= $proprety->grandeur ;?> m
                      <sup>2</sup>
                    </span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Beds:</strong>
                    <span><?= $proprety->chambre ;?></span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Kitchen:</strong>
                    <span><?= $proprety->cuisine ;?></span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Baths:</strong>
                    <span><?= $proprety->douche ;?></span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Garage:</strong>
                    <span><?= $proprety->garage ;?></span>
                    <?php $idMaison = $proprety->idMaison ;?>
                  </li>
                </ul>
              </div>
            </div>
                
                <!-- Modal Edit Information -->
                    
                 
                <button style="font-size:18px" name="ediHouse" type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#exampleModal">
                  <i class="fas fa-edit" aria-hidden="true" style="width:30px;"></i> Edit House
                </button>
                
                <a href="<?= base_url("Agence/Addpicture/index/$idMaison");?>">
                  <button style="font-size:18px;margin-top:12px" name="ediHouse" type="button" class="btn btn-warning btn-block">
                    <i class="fas fa-camera-retro" aria-hidden="true" style="width:30px"></i> Added Picture
                  </button>
                </a>

                <?php if ($proprety->statusMaison == 0) : ?>

                  <button id="deleteButton" style="font-size:18px;margin-top:12px" name="deleteHouse" type="button" class="btn btn-danger btn-block">
                    <i class="fas fa-trash" style="width:30px;"></i> Delete House
                  </button>

                <?php else : ?>

                  <button disabled style="font-size:18px;margin-top:12px" name="deleteHouse" type="button" class="btn btn-danger btn-block">
                    <i class="fas fa-trash" style="width:30px;"></i> Unable to delete
                  </button>

                <?php endif ?>
                
                <script typee="text/javascript">
              
                  let deleteButton = document.getElementById("deleteButton")

                  deleteButton.addEventListener("click",()=>{
                    
                      Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                      }).then((result) => {
                        if (result.isConfirmed) {
                          location.href = "<?= base_url("Agence/House/delete/$proprety->idMaison") ?>"
                        }
                      })

                  })

                </script>

                <br>
                <div>
                  <h3><label for="">Add visite time</label></h3>
                  <form id="form" action="<?= base_url("Agence/Agenda/AddVisite");?>" method="post">
                    <div class="form-group">
                      <input type="hidden" name="idMaison" value="<?= $idMaison ?>">
                      <input type="hidden" name="nomMaison" value="<?= $proprety->nomMaison ?>">
                    </div>
                    <div class="form-group">
                      <label for="">Date :</label>
                      <input class='form-control' type="date" name="dateVisite" id="">
                    </div>
                    <div class="form-group">
                      <label for="">When ?</label>
                      <input class='form-control' type="time" name="timeVisiteStart" id="">
                    </div>
                    <div class="form-group">
                      <label for="">To ?</label>
                      <input class='form-control' type="time" name="timeVisiteEnd" id="">
                    </div>
                    <div class="form-group">
                      <label for="">Color :</label>
                      <input class='form-control' type="color" name="color" id="">
                    </div>
                      <div class="form-control">
                        <input class="btn btn-dark btn-block btn-lg" type="submit" value="Save">
                      </div>
                  </form>
                </div>

                    <br><br> 

                      <div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div style="width: 800px; margin-left : -150px" class="modal-content">
                            <br>
                              <div style="margin-left: 50px;" class="modal-header">
                                <h3 class="modal-title" id="exampleModalLabel"><i class="fas fa-home" aria-hidden="true"></i>House Information</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">

                              <?php if (isset($message)) : ?>
                                <script>
                                
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Information',
                                    text: '<?= $message ?>',
                                })

                                </script>
                              <?php endif ?>

                                      <form id="form" action="<?= base_url("Agence/Newhouse/ouvrir");?>" method="post"> 
                  
                                      <div class="row">

                                            <!-- Name -->
                                          <div class="col">
                                            <input type="hidden" name="idMaison" value="<?= $proprety->idMaison ?>">
                                            <label for="">Name of the house</label>
                                            <input type="text" name="nomMaison" class="name form-control" placeholder="The House name"
                                            value="<?= $proprety->nomMaison ?>" autofocus required >
                                          </div>

                                          <div class="col">
                                            <label for="">House Address</label>
                                            <input type="text" name="adresseMaison" class="adresse form-control" placeholder="The house adresse"
                                            value="<?= $proprety->adresseMaison ?>" autofocus required >
                                          </div>

                                            <!-- Ville -->
                                          <div class="col">
                                          <label for="">City of House</label>
                                            <input type="text" name="villeMaison" class="ville form-control" placeholder="The City of the House"
                                            value="<?= $proprety->villeMaison ?>" autofocus required >
                                          </div>

                                      </div>
                                        <br>
                                      <div class="row">
                                        
                                          <div class="col">
                                            <label for="">House Country</label>
                                            <select name="paysMaison" class="pays form-control">
                                              <?php foreach ($pays as $nation) : ?>

                                                <option style="color: black;" <?= $variableNation = ($proprety->paysMaison == $nation->idPays) ? "selected" : "" ;?> value="<?= $nation->idPays ;?>"><?= $nation->nomPays ;?></option>

                                              <?php endforeach ?>
                                            </select>
                                          </div>

                                          <!-- Profession -->
                                          <div class="col">
                                            <label for="">Color</label>
                                            <input type="text" name="couleur" class="profession form-control" placeholder="The house color"
                                            value="<?= $proprety->couleur ?>" autofocus required >
                                          </div>

                                          <!-- Contact -->
                                          <div class="col">
                                            <label for="">Bedroom</label>
                                            <input type="number" name="chambre" class="contact form-control" placeholder="How many Rooms"
                                            value="<?= $proprety->chambre ?>" autofocus required >
                                          </div>

                                          <div class="col">
                                            <label for="">Kitchen Room</label>
                                            <input type="number" name="cuisine" class="contact form-control" placeholder="How many Rooms"
                                            value="<?= $proprety->cuisine ?>" autofocus required >
                                          </div>

                                      </div>

                                      <br> 
                                        
                                      <div class="row">

                                          <div class="col">
                                            <label for="">Bathroom</label>
                                            <input type="number" name="douche" class="contact form-control" placeholder="How many Bathroom"
                                            value="<?= $proprety->douche ?>" autofocus required >
                                          </div>

                                          <div class="col">
                                            <label for="">Garage</label>
                                            <input type="number" name="garage" class="contact form-control" placeholder="How many Garage"
                                            value="<?= $proprety->garage ?>" autofocus required >
                                          </div>

                                          <div class="col">
                                            <label for="">House Area</label>
                                            <input type="number" name="area" class="contact form-control" placeholder="how much does the house cost"
                                            value="<?= $proprety->grandeur ?>" autofocus required >
                                          </div>

                                          <div class="col">
                                            <label for="">The price</label>
                                            <input type="number" name="prix" class="contact form-control" placeholder="how much does the house cost"
                                            value="<?= $proprety->prix ?>"autofocus required >
                                          </div>

                                        </div>
                                        <br>
                                        <div class="row">
                                          <div class="col">
                                            <label for="">Description</label>
                                            <textarea name="description" class="description form-control" rows="10"></textarea>
                                          </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                          <div class="col-md-5">
                                          <button class="button btn btn-lg btn-success" name="save" type="submit">
                                            <i class="fas fa-edit" aria-hidden="true"></i>
                                            Update Information
                                          </button>
                                          </div>
                                        </div>

                                        <br>
                                        
                                      </div>
                                      
                                    </form>  

                              </div>
                            </div>
                          </div>
                        </div>

                      </div>

                      <!-- End of Modal Edit Information -->
                  <div class="col-md-9">
                    <?php if ($nombre->nombreRoom != 0) : ?>
      
                        <div class="row justify-content-between">
                          <div class="col-md-10 offset-md-1">
                            <ul class="nav nav-pills-a nav-pills mb-3 section-t3" id="pills-tab" role="tablist">
                                
                                  <li class="nav-item">
                                    <a class="nav-link active" id="pills-video-tab" data-bs-toggle="pill" href="#pills-video" role="tab" aria-controls="pills-video" aria-selected="true" style="color:black">
                                      Bedroom
                                    </a>
                                  </li>
                                
                                  <li class="nav-item">
                                    <a class="nav-link" id="pills-plans-tab" data-bs-toggle="pill" href="#pills-plans" role="tab" aria-controls="pills-plans" aria-selected="false"style="color:black">
                                      Kitchen
                                    </a>
                                  </li>

                                <li class="nav-item">
                                  <a class="nav-link" id="pills-map-tab" data-bs-toggle="pill" href="#pills-map" role="tab" aria-controls="pills-map" aria-selected="false"style="color:black">
                                    Bathroom
                                  </a>
                                </li>

                                <li class="nav-item">
                                  <a class="nav-link" id="pills-map-garage-tab" data-bs-toggle="pill" href="#pills-map-garage" role="tab" aria-controls="pills-map-garage" aria-selected="false" style="color:black">
                                    Garage
                                  </a>
                                </li>

                            </ul>
                            <div class="tab-content" id="pills-tabContent">

                            <!-- BEDROOM WINDOWS -->

                              <div class="tab-pane fade show active" id="pills-video" role="tabpanel" aria-labelledby="pills-video-tab">
                                <div class="intro intro-carousel swiper position-relative">
                                  <div class="swiper-wrapper">

                                    <?php foreach ($bedroom as $room) : ?>
                                      
                                      <div class="carousel-item-b swiper-slide">
                                        <div class="img-box-a">
                                          <img src="<?= $image = ($room == "null") ? base_url("assets/img/House/house.jpg") : base_url("assets/img/House/$room->idMaison/$room->imgChambre")?>" alt="">
                                        </div>
                                      </div>

                                    <?php endforeach ?>

                                  </div>
                                  <div class="swiper-pagination"></div>
                                </div>
                              </div>

                              <!-- KITCHEN WINDOWS -->

                              <div class="tab-pane fade" id="pills-plans" role="tabpanel" aria-labelledby="pills-plans-tab">
                                <div class="intro intro-carousel swiper position-relative">
                                  <div class="swiper-wrapper">
                                    <?php foreach ($kitchen as $room) : ?>

                                      <div class="carousel-item-b swiper-slide">
                                        <div class="img-box-a">
                                          <img src="<?= $image = ($room == null) ? base_url("assets/img/House/house.jpg") : base_url("assets/img/House/$room->idMaison/$room->imgChambre")?>" alt="">
                                        </div>
                                      </div>

                                    <?php endforeach ?>

                                  </div>
                                  <div class="swiper-pagination"></div>
                                </div>
                              </div>

                              <!-- BATHROOM WINDOWS -->

                              <div class="tab-pane fade" id="pills-map" role="tabpanel" aria-labelledby="pills-map-tab">
                                <div class="intro intro-carousel swiper position-relative">
                                  <div class="swiper-wrapper">
                                    <?php foreach ($bathroom as $room) : ?>

                                      <div class="carousel-item-b swiper-slide">
                                        <div class="img-box-a">
                                          <img src="<?= $image = ($room == null) ? base_url("assets/img/House/house.jpg") : base_url("assets/img/House/$room->idMaison/$room->imgChambre")?>" alt="">
                                        </div>
                                      </div>

                                    <?php endforeach ?>

                                  </div>
                                  <div class="swiper-pagination"></div>
                                </div>
                                </div>

                              <!-- GARAGE WINDOWS -->

                              <div class="tab-pane fade" id="pills-map-garage" role="tabpanel" aria-labelledby="pills-map-garage-tab">
                                <div class="intro intro-carousel swiper position-relative">
                                  <div class="swiper-wrapper">
                                    <?php foreach ($garage as $room) : ?>

                                      <div class="carousel-item-b swiper-slide">
                                        <div class="img-box-a">
                                          <img src="<?= $image = ($room == null) ? base_url("assets/img/House/house.jpg") : base_url("assets/img/House/$room->idMaison/$room->imgChambre")?>" alt="">
                                        </div>
                                      </div>

                                    <?php endforeach ?>

                                  </div>
                                  <div class="swiper-pagination"></div>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>
                    <?php endif ?>
                    <br><br>
                    <div style="margin-left:80px">
                      
                        <section class="property-single nav-arrow-b">
                          <div class="container">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th scope="col">Visite</th>
                                <th scope="col">Event Title</th>
                                <th scope="col">Start Event</th>
                                <th scope="col">End Event</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($agenda as $item) : ?>
                                <tr>
                                <td scope="row"><?= $item->idVisite ;?></td>
                                <td><?= $item->titreEvent ;?>
                                <td><?= $item->startEvent ;?>
                                <td><?= $item->endEvent ;?></td>
                                <td>
                                  <a href="<?= base_url("Agence/Agenda/deleteVisite/$proprety->idMaison/$item->idVisite/$item->titreEvent/$item->startEvent/$item->endEvent") ?>">
                                    <button type="button" class="btn btn-danger">
                                      <i class="fas fa-trash" style="font-size:20px"></i>
                                    </button>
                                  </a>

                                  <a href="<?= base_url("Agence/Agenda") ?>">
                                    <button type="button" class="btn btn-warning">
                                      <i class="fas fa-info-circle" style="font-size:20px"></i>
                                    </button>
                                  </a>
                                </td>
                              </tr>
                              <?php endforeach ?>
                            </tbody>
                          </table>
                          </div>
                        </section><!-- End Property Single-->

                    </div>
                </div>
            </div>
        </div>
      </div>
    </section><!-- End Property Single-->

    
<script type="text/javascript">

$uploadCrop = $('#upload-input').croppie({
    enableExif: true,
    viewport: {
        width: 500,
        height: 660,
        type: 'square'
    },
    boundary: {
        width: 510,
        height: 600
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
      url: "<?= base_url("Agence/Newhouse/uploadImage") ;?>",
      type: "POST",
      data: { "image" : response, "idMaison" : <?= $proprety->idMaison ?>},
      success: function (data) { 
        if (data.success) {
          Swal.fire({
            icon: data.icon,
            title: 'Update Profil!',
            text: data.msg
          }).then((result) => {
            if (result.isConfirmed) {
              location.href = "<?= base_url("Agence/House/index/$proprety->idMaison") ?>"
            }
          })
        }
      }
		});
	});
});
</script>

  </main><!-- End #main -->

