<main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single"><?= $proprety->nomMaison ;?></h1>
              <span class="color-text-a">

              <?php if (isset($stats->statusMaison)) : ?>
                <a href="<?= base_url("Admin/Profil/index/".$stats->idClient)?>">
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
                <img src="<?= base_url("assets/img/House/$proprety->idMaison/".$proprety->imgMaison) ;?>" 
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
                </div>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="row justify-content-between">
              <div class="col-md-9 col-lg-7 section-md-t3">
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
          <div class="col-lg-3">
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
                <div class="col-sm-12">
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
                    <span><?= $proprety->paysMaison ;?></span>
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
                    <strong>Baths:</strong>
                    <span><?= $proprety->douche ;?></span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Garage:</strong>
                    <span><?= $proprety->garage ;?></span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
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
          </div>
        </div>
        <div class="row justify-content-between">
        
          <div class="col-md-12">
            <div class="row section-t3">
              <div class="col-sm-12">
                <div class="title-box-d">
                  <h3 class="title-d">Contact Agent</h3>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-lg-4">
                <img src="<?= $imageAgence = $proprety->pdpUser == null ? base_url("assets/img/User/avatar-male.jpg") : base_url("assets/img/Agence/$proprety->pdpUser") ?>" alt="" class="img-fluid">
              </div>
              <div class="col-md-6 col-lg-4">
                <div class="property-agent">
                  <h3 class="title-agent"><?= $proprety->prenomAgence . "<h5>" . $proprety->nomAgence ."</h5>" ;?></h3>
                  <br>
                  <ul class="list-unstyled">
                    <li class="d-flex justify-content-between">
                      <strong>Phone:</strong>
                      <span class="color-text-a"><?= $proprety->contactAgence ?></span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Email:</strong>
                      <span class="color-text-a"><?= $proprety->emailAgence ?></span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Adresse:</strong>
                      <span class="color-text-a"><?= $proprety->adresseAgence ?></span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>City:</strong>
                      <span class="color-text-a"><?= $proprety->villeAgence ?></span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Action:</strong>
                      <span class="color-text-a">
                        <a href="<?= base_url("Admin/Profilagents/index/$proprety->idAgence") ?>">Click here for more Information</a>
                      </span>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-12 col-lg-4">
                <div class="property-contact">
                  <form class="form-a">
                    <div class="row">
                      <div class="col-md-12 mb-1">
                        <div class="form-group">
                          <input type="text" class="form-control form-control-lg form-control-a" id="inputName" placeholder="Name *" required>
                        </div>
                      </div>
                      <div class="col-md-12 mb-1">
                        <div class="form-group">
                          <input type="email" class="form-control form-control-lg form-control-a" id="inputEmail1" placeholder="Email *" required>
                        </div>
                      </div>
                      <div class="col-md-12 mb-1">
                        <div class="form-group">
                          <textarea id="textMessage" class="form-control" placeholder="Comment *" name="message" cols="45" rows="8" required></textarea>
                        </div>
                      </div>
                      <div class="col-md-12 mt-3">
                        <button type="submit" class="btn btn-a">Send Message</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section><!-- End Property Single-->

    <br><br>

  </main><!-- End #main -->