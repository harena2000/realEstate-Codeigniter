<main id="main">
    
<?php if (isset($message)) : ?>
  <script>

    Swal.fire({
      icon: 'success',
      title: 'Information',
      
      text: '<?= $message ?>',
    })

  </script>

<?php endif ?>

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Amazing Properties</h1>
              <span class="color-text-a">Grid House</span>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Property Grid ======= -->
    <section class="property-grid grid">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="grid-option">
              <a href="<?= base_url("Agence/Newhouse/index") ?>">
                <button style="width: 300px;" class="btn btn-success btn-lg">
                  <i class="fas fa-plus" aria-hidden="true"></i> Add New House
                </button>
              </a>
            </div>
          </div>

          <table id="mydatatable">
          
          <?php foreach ($proprety as $item) : ?>
          <div class="col-md-4">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
                <img src="
                <?= $image = ($item->imgMaison == null) ? base_url("assets/img/House/house.jpg") : base_url("assets/img/House/$item->idMaison/$item->imgMaison"); ?>" 
                class="img-a img-fluid">
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
                      <span class="price-a"><?php $status = $item->statusMaison == 0 ? "rent | ". number_format($item->prix) : "Sold";
                                                  echo $status;?>
                      </span>
                    </div>
                    <a href="<?php echo base_url('Agence/House/index') . "/" . $item->idMaison?>" class="link-a">Click here to view
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
          </div>
          <?php endforeach ?>

          </table>

    </section><!-- End Property Grid Single-->

  </main><!-- End #main -->