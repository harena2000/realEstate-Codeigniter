
  
<main id="main">

<!-- ======= Intro Single ======= -->
<section class="intro-single">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-8">
        <div class="title-single-box">
          <h1 class="title-single"><?php echo $liste->prenomAgence?></h1>
          <span class="color-text-a"><?php echo $liste->emailUser . " : " . $liste->contactAgence;?></span>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Intro Single -->

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
                      $avatar = ($liste->sexeAgence == 0) ? 
                        base_url('assets/img/User/avatar-male.jpg') : base_url('assets/img/User/avatar-female.jpg') ;
                        echo $avatar;
                    } 
                    else {
                      echo base_url('assets/img/Agence/'.$liste->pdpUser);
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
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-5 section-md-t3">
            <div class="agent-info-box">
              <div class="agent-title">
                <div class="title-box-d">
                  <h3 class="title-d"><?php echo $liste->prenomAgence
                    ."<br>". $liste->nomAgence;?>
                  </h3>
                </div>
              </div>
              <div class="agent-content mb-3">
                <div class="info-agents color-a">
                  <div class="row">
                    <div class="col">
                      <p>
                        <strong>Name: </strong>
                        <span class="color-text-a"> <?php echo $liste->nomAgence;?> </span>
                      </p>
                      <p>
                        <strong>First Name: </strong>
                        <span class="color-text-a"> <?php echo $liste->prenomAgence;?> </span>
                      </p>
                      <p>
                        <strong>Gender: </strong>
                        <span class="color-text-a"> 
                            <?php $sex = ($liste->sexeAgence == 0) ? "Men" : "Women" ;
                            echo $sex ;?>
                        </span>
                      </p>
                      <p>
                        <strong>Adresse: </strong>
                        <span class="color-text-a"> <?php echo $liste->adresseAgence;?> </span>
                      </p>
                      <p>
                        <strong>Birthday: </strong>
                        <span class="color-text-a"> <?php echo $liste->dateNaissanceAgence;?></span>
                      </p>
                    </div>
                    <div class="col">
                      <p>
                        <strong>City: </strong>
                        <span class="color-text-a"> <?php echo $liste->villeAgence;?> </span>
                      </p>
                      <p>
                        <strong>Country: </strong>
                        <span class="color-text-a"> <?php echo $liste->nomPays;?> </span>
                      </p>
                      <p>
                        <strong>State: </strong>
                        <span class="color-text-a"> <?= $select = $liste->statusAgence == 0 ? "Single" : "Married" ;?> </span>
                      </p>
                      <p>
                        <strong>Experience: </strong>
                        <span class="color-text-a"> <?php echo $liste->anneeExperience;?> ans</span>
                      </p>
                      <p>
                        <strong>Born in: </strong>
                        <span class="color-text-a"> <?php echo $liste->lieuNaissanceAgence;?></span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ======= Latest Properties Section ======= -->
<section class="section-property section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Property</h2>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          
        
        <?php foreach ($maison as $house) : ?>
          <div class="col-md-4">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
                <img src="<?= $m = $house->imgMaison == null ? base_url('assets/img/House/house.jpg') : base_url("assets/img/House/$house->idMaison/$house->imgMaison") ;?>" class="img-a img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <a href="#"><?= $house->villeMaison ;?>
                        <br /> <?= $house->nomMaison ;?></a>
                    </h2>
                  </div>
                  <div class="card-body-a">
                    <div class="price-box d-flex">
                      <span class="price-a"><?php echo "rent | ". number_format($house->prix);?>
                      </span>
                    </div>
                    <a href="<?php echo base_url('Admin/House/index') . "/" . $house->idMaison ."/$liste->idAgence"?>" class="link-a">Click here to view
                      <span class="ion-ios-arrow-forward"></span>
                    </a>
                  </div>
                  <div class="card-footer-a">
                    <ul class="card-info d-flex justify-content-around">
                      <li>
                        <h4 class="card-info-title">Area</h4>
                        <span><?= $house->grandeur ;?>
                          <sup>2</sup>
                        </span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Beds</h4>
                        <span><?= $house->chambre ;?></span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Baths</h4>
                        <span><?= $house->douche ;?></span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Garages</h4>
                        <span><?= $house->garage ;?></span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach ?>

        </div>
        
        
      </div>
    </section><!-- End Latest Properties Section -->

<br><br>

</main><!-- End #main -->