
<section>

<!-- ======= Intro Section ======= -->

<div class="intro intro-carousel swiper position-relative">

    <div class="swiper-wrapper">

      <?php foreach ($display as $house) : ?>

        <div class="swiper-slide carousel-item-a intro-item bg-image" 
            style="
              background-image: url(<?= $image = ($house->imgMaison == "") ? base_url("assets/img/House/house.jpg") : base_url("assets/img/House/$house->idMaison/$house->imgMaison")?>);
            ">
          <div class="overlay overlay-a"></div>
          <div class="intro-content display-table">
            <div class="table-cell">
              <div class="container">
                <div class="row">
                  <div class="col-lg-8">
                    <div class="intro-body">
                      <p class="intro-title-top"><?= $house->villeMaison ." ". $house->nomPays ;?>
                        <br> <?= $house->couleur ?>
                      </p>
                      <h1 class="intro-title mb-4 ">
                        <span class="color-b"><?= $house->nomMaison ?> </span></span>
                        <br> <h4 style="margin-top:-20px;color:white"><?= $house->adresseMaison ;?></h4>
                      </h1>
                      <p class="intro-subtitle intro-price">
                        <a href="<?php echo base_url('Admin/House/index/'.$house->idMaison)?>" style="color:white;font-size:15px">
                        Click here to view more information >
                        <br>
                        <span class="price-a">
                          <?= $sold = ($house->statusMaison == 0) ? "rent | ".number_format($house->prix) : "SOLD";?>
                        </span></a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      <?php endforeach ?>

    </div>
    <div class="swiper-pagination"></div>
  </div><!-- End Intro Section -->

</section>

<section>

<main id="main">

    <!-- ======= Latest Properties Section ======= -->
    <section class="section-property section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Latest Properties</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div id="property-carousel" class="swiper">
            <div class="swiper-wrapper">

              <?php foreach ($maison as $house) : ?>

              <div class="carousel-item-b swiper-slide">
                <div class="card-box-a card-shadow">
                  <div class="img-box-a">
                    <img src="
                    <?= $image = ($house->imgMaison == "") ? base_url("assets/img/House/house.jpg") : base_url("assets/img/House/$house->idMaison/$house->imgMaison"); ?>
                    " class="img-a img-fluid">
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
                          <span class="price-a"><?= $sold = ($house->statusMaison == 0) ? "rent | ". number_format($house->prix) : "SOLD";?>
                          </span>
                        </div>
                        <a href="<?php echo base_url('Client/House/index') . "/" . $house->idMaison?>" class="link-a">Click here to view
                          <span class="bi bi-chevron-right"></span>
                        </a>
                      </div>
                      <div class="card-footer-a">
                        <ul class="card-info d-flex justify-content-around">
                          <li>
                            <h4 class="card-info-title">Area</h4>
                            <span><?= $house->grandeur ;?>
                              m<sup>2</sup>
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
          <div class="propery-carousel-pagination carousel-pagination"></div>
        </div>
      </div>
    </section><!-- End Latest Properties Section -->

    <!-- ======= Agents Section ======= -->
    <section class="section-agents section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Last user added</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="row">

          <?php foreach ($client as $user) : ?>

          <div class="col-md-4">
            <div class="card-box-d">
              <div class="card-img-d">
                <img src="<?php 
                    if ($user->pdpUser == null) {
                      $avatar = ($user->sexe == 0) ? 
                        base_url('assets/img/User/avatar-male.jpg') : base_url('assets/img/User/avatar-female.jpg') ;
                        echo $avatar;
                    } 
                    else {
                      echo base_url('assets/img/User/'.$user->pdpUser);
                    }
                    
                    
                  ?>" alt="" class="img-d img-fluid">
              </div>
              <div class="card-overlay card-overlay-hover">
                <div class="card-header-d">
                  <div class="card-title-d align-self-center">
                    <h4 class="title-d">
                      <a href="<?= base_url("Admin/Profil/index/".$user->idClient)?>" class="link-two"><?= $user->nomClient ;?>
                        <br> <?= $user->prenomClient ;?></a>
                    </h4>
                  </div>
                </div>
                <div class="card-body-d">
                  <div class="info-agents color-a">
                    <p>
                      <strong><i class="fas fa-venus-mars" aria-hidden="true"></i> Gender: </strong> <?= $sexe = ($user->sexe == 0) ? "Men" : "Women" ;?>
                    </p>
                    <p>
                      <strong><i class="fas fa-home" aria-hidden="true"></i> Address: </strong> <?= $user->adresse ;?>
                    </p>
                    <p>
                      <strong><i class="fas fa-city" aria-hidden="true"></i> City: </strong> <?= $user->ville ;?>
                    </p>
                    <p>
                      <strong><i class="fas fa-flag" aria-hidden="true"></i> Country: </strong> <?= $user->pays ;?>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <?php endforeach ?>
          
        </div>
      </div>
    </section><!-- End Agents Section -->
  </main><!-- End #main -->
</section>