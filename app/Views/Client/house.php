<main id="main">
  
    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single"><?= $proprety->nomMaison ;?></h1>
              <span class="color-text-a"><?= "Ville ".$proprety->villeMaison . ", " .$proprety->adresseMaison ;?></span>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

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
    </div>


    <!-- ======= Property Single ======= -->
    <section class="property-single nav-arrow-b">
      <div class="container" style="margin-top:-80px">
        <div class="row">
          <div class="col-md-6">
            <div class="row justify-content-between">
              <div class="col-md-9 col-lg-10 section-md-t3">
                <br>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="title-box-d">
                      <h3 class="title-d">Property Description</h3>
                    </div>
                  </div>
                </div>
                <div class="property-description">
                  <p class="description color-text-a"><?= $proprety->description ;?></p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-5">
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
                    <strong>Country:</strong>
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
            
            <!-- Modal Edit Information -->
                
                <?php if ($proprety->statusMaison == 0) : ?>
                  <button name="editInfo" type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-dollar" aria-hidden="true"></i> Sale
                  </button>
                <?php else : ?>
                  <button type="button" class="btn btn-dark btn-block" disabled>
                    <i class="fas fa-dollar" aria-hidden="true"></i> Sold
                  </button>
                <?php endif ?>
                
                <br><br> 

                  <div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div style="width: 800px; margin-left : -150px" class="modal-content">
                        <br>
                          <div style="margin-left: 50px;" class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel"><i class="fas fa-home" aria-hidden="true"></i> Sale the House</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">

                          <?php if (isset($message)) : ?>
                            <script>
                            
                            Swal.fire({
                                icon: 'error',
                                title: 'Information',
                                text: '<?= $message ?>',
                            })

                            </script>
                          <?php endif ?>

                            <form id="form" action="<?= base_url("Client/Achete");?>" method="post"> 
                            
                              <div>

                                <?php 
                                  $pourcentage = (($proprety->prix * 20) / 100) ;
                                ?>
                                <h3><label for=""></label><?= $proprety->nomMaison ;?></h3>
                                <span>Adresse : <?= $proprety->adresseMaison .", ".$proprety->villeMaison ." - ". $proprety->paysMaison;?></span>
                                <br><span>Price : <?= number_format($proprety->prix);?> Ar</span>
                                <br><h3>
                                  <span style="color:green">
                                    <?= $rem = ($remise->counting >= 1) ? "You will have an reduction of 20% for this house" : "" ;?>
                                  </span>
                                </h3>
                                <span>
                                   <?= $rem = ($remise->counting >= 1) ? "<h4>20% : ".number_format($pourcentage)." Ar</h4>"
                                   : "You must pay at least :".number_format($pourcentage). " Ar" ;?>
                                </span>

                              </div>

                              <br>
                              <div class="form-group">
                                <input type="hidden" name="idMaison" value="<?= $proprety->idMaison ;?>">
                                <input type="hidden" name="prixMaison" value="<?= $proprety->prix ;?>">
                                <label for="">Year of Contract</label>
                                <input class="form-control" type="number" min="1" name="yearContract" id="" autofocus>
                              </div>
                              <div class="form-group">
                                <label for="">First Payment</label>
                                <h5><?= $rem = ($remise->counting >= 1) ? "Your first payment will be free" : "" ;?></h5>
                                <input value="<?= $pourcentage?>" min="<?= $pourcentage?>" max="<?= $proprety->prix?>" 
                                  class="pay form-control" type="<?= $rem = ($remise->counting >= 1) ? "hidden" : "number" ;?>" name="firstPayment" 
                                  placeholder="Your first payment must be more than 20% of the price">
                                <span id="instruction"></span>
                                <input type="hidden" name="remise" value="<?= $remise->counting ?>">
                              </div>
                              <br>
                            
                            <div class="modal-footer">
                              <button type="button" class="btn
                                btn-secondary" data-dismiss="modal">Close</button>
                              <button class="button btn btn-lg btn-success" name="save" type="submit">
                                Pay
                              </button>
                            </div>

                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>

                  <!-- End of Modal Edit Information -->

              </div>
              <div class="col">
                <h3>House Visite</h3>
                <div>
                      
                        <section class="property-single nav-arrow-b">
                          <div class="container">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th scope="col">Visite</th>
                                <th scope="col">Event Title</th>
                                <th scope="col">Start Event</th>
                                <th scope="col">End Event</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php if ($agenda != null) : ?>
                                <?php foreach ($agenda as $item) : ?>
                                  <tr>
                                    <td scope="row"><?= $item->idVisite ;?></td>
                                    <td><?= $item->titreEvent ;?>
                                    <td><?= $item->startEvent ;?>
                                    <td><?= $item->endEvent ;?></td>
                                  </tr>
                                <?php endforeach ?>
                              <?php else : ?>
                                
                                <tr>
                                    <td colspan="4" style="text-align:center;color:gray">Empty Data</td>
                                </tr>

                              <?php endif ?>
                              
                            </tbody>
                          </table>
                          </div>
                        </section><!-- End Property Single-->

                    </div>
              </div>

        </div>
        <div class="row justify-content-between" style="margin-top:-20px">
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
                        <a href="<?= base_url("Client/Profilagents/index/$proprety->idAgence") ?>">Click here for more Information</a>
                      </span>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-12 col-lg-4">
                <div class="property-contact">
                  <form action="<?= base_url("Client/Message/sendMessage") ?>" class="form-a" method = "POST">
                    <div class="row">

                    <?php if ($haveGroup == null) : ?>
                      
                      <div class="col-md-12 mb-1">
                        <div class="form-group">
                          <input name="groupName" type="text" class="form-control form-control-lg form-control-a" id="inputName" placeholder="Name *" required>
                        </div>
                      </div>

                    <?php endif ?>


                    <?php if ($haveGroup != null) : ?>
                      
                      <div class="col-md-12 mb-1">
                        <div class="form-group">
                          <input name="groupName" value="Mandray Fona" type="hidden" class="form-control form-control-lg form-control-a" id="inputName" placeholder="Name *" required>
                        </div>
                      </div>

                    <?php endif ?>
                      
                      <div class="col-md-12 mb-1">
                        <div class="form-group">
                          <input name="email" type="hidden" value="<?= $proprety->emailAgence ?>">
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

  </main><!-- End #main -->