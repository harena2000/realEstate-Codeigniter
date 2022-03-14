<main id="main">
    
    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">I Pay My Apartment</h1>
              <span class="color-text-a">List of my apartement</span>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Property Grid ======= -->
    <section class="property-grid grid">
      <div class="container">
        <div class="row">
         
          <?php

            use CodeIgniter\I18n\Time;

          if (isset($message)) : ?>
            <script>
            
            Swal.fire({
                icon: 'info',
                title: 'Information',
                text: '<?= $message ?>',
            })

            </script>
          <?php endif ?>

          <?php

          if (isset($error)) : ?>
            <script>
            
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '<?= $error ?>',
            })

            </script>
          <?php endif ?>

          <?php

          if (isset($success)) : ?>
            <script>
            
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '<?= $success ?>',
            })

            </script>
          <?php endif ?>

          <table id="mydatatable">
          
          <?php foreach ($proprety as $item) : ?>
          <div class="col-md-3">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
                <img src="<?= base_url("assets/img/House/$item->idMaison/".$item->imgMaison) ;?>" class="img-a img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <a href="#"><?= $item->villeMaison ;?>
                        <br /> <?= $item->nomMaison ;?></a>
                    </h2>
                  </div>
                  <div class="card-body-a">
                    <div class="price-box d-flex">
                      <span class="price-a"><?php $regular = ($item->reste > 0) ? "Left | " . number_format($item->reste) : "Complet";
                                                  echo $regular;?>
                      </span>
                    </div>
                    <a href="<?php echo base_url('Client/House/index') . "/" . $item->idMaison?>" class="link-a">Click here to view
                      <span class="ion-ios-arrow-forward"></span>
                    </a>
                  </div>
                  <div class="card-footer-a">
                    <ul class="card-info d-flex justify-content-around">
                      <li>
                        <h4 class="card-info-title">Area</h4>
                        <span><?= $item->grandeur ;?>
                          <sup>2</sup>
                        </span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Beds</h4>
                        <span><?= $item->chambre ;?></span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Baths</h4>
                        <span><?= $item->douche ;?></span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Garages</h4>
                        <span><?= $item->garage ;?></span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            
            <?php if (Time::createFromDate() > $item->finContrat) : ?>

              <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Out of Contract</h4>
                <p></p>
                <p class="mb-0">You must Pay the Total</p>
              </div>

            <?php endif ?>
          </div>
          <div class="col">
          <?php if ($item->reste > 0) : ?>
              <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                  <div class="card-header">Payment</div>
                  <div class="card-body">
                    <h5 class="card-title"><?= $item->nomMaison ;?></h5>
                      <p style="margin-top: -40px;" class="card-text">              
                          <?php $pourcentage = (($item->prix * 20) / 100) ;?>
                          <span><br><strong>Start of Contract : </strong><?= $item->debutContrat;?></span>
                          <span><br><strong>End of Contract : </strong><?= $item->finContrat;?></span>
                          <span><br><strong>Contract Years : </strong><?= $item->contrat;?></span>
                          <span><br><strong>My Sold :
                            </strong> <?= number_format($myAccount->solde);?> Ar</span>
                          <br><span><strong>Price :
                            </strong> <?= number_format($item->prix);?> Ar</span>
                          <br><span><strong>Left :
                            </strong> <?= number_format($item->reste) ;?> Ar</span>

                      </p>
                              
                    <div>

                    <!-- Modal -->
                              
                      <form id="form" action="<?= base_url("Client/Achete/suite/") ?>" method="post"> 
                                        
                        <div class="form-group">
                          <input type="hidden" name="idMaison" value="<?= $item->idMaison ;?>">
                          <input type="hidden" name="prixMaison" value="<?= $item->prix ;?>">
                        </div>
                        <div class="form-group">
                          <label for="">Continue to Pay</label>
                          <input min="100000" max="<?php echo $item->reste?>" class="pay form-control" type="number" name="firstPayment" id="pay" onkeydown="numberValidation()"
                            value="100000" required autofocus>
                          <span id="errorMsg" style="display: none; color: #FB8691;">Please, you must pay much more!<br>Minimum : 100,000 Ar</span>
                          <span id="min" style="color: #00ff00;">Minimum</span>
                          <span id="merci" style="display: none;color: #00ff00;">Thank you for your participation</span>
                        </div>
                        <input onclick="confirmation()" type="button" name="save" class="btn btn-lg btn-primary btn-block" value="Pay">
                      </form>

                        <script>
                        function numberValidation()
                        {
                              var valid = document.getElementById("pay");

                              $( "#pay" ).keyup(function() {
                                if ($('#pay').val() == 100000) {
                                  $('#min').show();
                                  $('#merci').hide();
                                  $('#errorMsg').hide();
                                }
                                else if($('#pay').val()< 99999 ){
                                  $('#errorMsg').show();
                                  $('#merci').hide();
                                  $('#min').hide();
                                  
                                }
                                else if($('#pay').val()> 100000 ){
                                  $('#errorMsg').hide();
                                  $('#min').hide();
                                  $('#merci').show();
                                }
                              });
                        } 

                        function confirmation() { 
                            Swal.fire({
                              title: 'Are you sure?',
                              text: "You won't be able to revert this!",
                              icon: 'warning',
                              showCancelButton: true,
                              confirmButtonColor: '#3085d6',
                              cancelButtonColor: '#d33',
                              confirmButtonText: 'Yes!'
                            }).then((result) => {
                              if (result.isConfirmed) {
                                  document.forms["form"].submit();
                              }
                            })
                         }
                        </script>
                    </div>
                    <?php else : ?>
                        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                            <div class="card-header">Payment</div>
                            <div class="card-body">
                              <h1 class="card-title">Regular</h1>
                              <p class="card-text">
                                <span><strong>Adresse :</strong> 
                                              <?= $item->adresseMaison .", 
                                              ".$item->villeMaison ." - ". $item->paysMaison;?>
                                </span>.</p>
                            </div>
                        </div>
                  <?php endif ?>
          </div>
        </div>            
      </div>

    <?php endforeach ?>
  </table>

        
  </section><!-- End Property Grid Single-->
</main><!-- End #main -->