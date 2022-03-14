<main id="main">
    <!-- ======= Intro Single ======= -->
        <section class="intro-single">
        <div class="container">
            <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="title-single-box">
                    <h1 class="title-single">Search result</h1>
                    <span class="color-text-a">Result list of house</span>
                </div>
            </div>
            </div>
        </div>
        </section><!-- End Intro Single-->    
        
    <?php if ($house != null) : ?>

        <section class="property-grid grid">
            <div class="container">

                <div class="col">
                    <h2>House List</h2>
                </div>
                <hr>
                <div class="row">
          
                    <?php foreach ($house as $item) : ?>
                        <div class="col-md-4">
                            <div class="card-box-a card-shadow">
                                <div class="img-box-a">
                                    <img src="<?= $m = $item->imgMaison != null ? base_url("assets/img/House/$item->idMaison/".$item->imgMaison) : base_url("assets/img/House/house.jpg")?>" class="img-a img-fluid">
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
                                <a href="<?php echo base_url('Admin/House/index') . "/" . $item->idMaison?>" class="link-a">Click here to view
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

        </section><!-- End Property Grid Single-->

    <?php endif ?>


    <?php if ($user != null) : ?>

        <section class="property-grid grid">
            <div class="container">

                <div class="col">
                    <h2>User List</h2>
                </div>
                <hr>
                <div class="row">
          
                    <?php foreach ($user as $item) : ?>
                        <div class="col-md-4">
                            <div class="card-box-a card-shadow">
                                <div class="img-box-a">
                                    <img src="<?= $u = $item->pdpUser == null ? base_url("assets/img/User/avatar-male.jpg") : base_url("assets/img/User/$item->pdpUser")?>" class="img-a img-fluid">
                                </div>
                            <div class="card-overlay">
                        <div class="card-overlay-a-content">
                            <div class="card-header-a">
                                <h4 class="card-title-a">
                                <a href="#"><?= $item->prenomClient ;?>
                                    <br /> <?= $item->nomClient ;?></a>
                                </h4>
                            </div>
                            <div class="card-body-a">
                                <div class="price-box d-flex">
                                    <span class="price-a"><?= $status = $item->sexe == 0 ? "Men" : "Women";?></span>
                                </div>
                                <a href="<?php echo base_url('Admin/Profil/index') . "/" . $item->idClient?>" class="link-a">Click here to view
                                <span class="ion-ios-arrow-forward"></span>
                                </a>
                            </div>
                            <div class="card-footer-a">
                                <ul class="card-info d-flex justify-content-around">
                                <li>
                                    <h4 class="card-info-title">Adresse</h4>
                                    <span><?= $item->adresse ;?></span>
                                </li>
                                <li>
                                    <h4 class="card-info-title">Ville</h4>
                                    <span><?= $item->ville ;?></span>
                                </li>
                                </ul>
                            </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </section><!-- End Property Grid Single-->

    <?php endif ?>

    <?php if ($agence != null) : ?>

        <section class="property-grid grid">
            <div class="container">

                <div class="col">
                    <h2>Agence List</h2>
                </div>
                <hr>
                <div class="row">
          
                    <?php foreach ($agence as $item) : ?>
                        <div class="col-md-4">
                            <div class="card-box-a card-shadow">
                                <div class="img-box-a">
                                    <img src="<?= $u = $item->pdpUser == null ? base_url("assets/img/Agence/avatar-male.jpg") : base_url("assets/img/Agence/$item->pdpUser")?>" class="img-a img-fluid">
                                </div>
                            <div class="card-overlay">
                        <div class="card-overlay-a-content">
                            <div class="card-header-a">
                                <h4 class="card-title-a">
                                <a href="#"><?= $item->prenomAgence ;?>
                                    <br /> <?= $item->nomAgence ;?></a>
                                </h4>
                            </div>
                            <div class="card-body-a">
                                <div class="price-box d-flex">
                                    <span class="price-a"><?= $status = $item->sexeAgence == 0 ? "Men" : "Women";?></span>
                                </div>
                                <a href="<?php echo base_url('Admin/Profilagents/index') . "/" . $item->idAgence?>" class="link-a">Click here to view
                                <span class="ion-ios-arrow-forward"></span>
                                </a>
                            </div>
                            <div class="card-footer-a">
                                <ul class="card-info d-flex justify-content-around">
                                <li>
                                    <h4 class="card-info-title">Adresse</h4>
                                    <span><?= $item->adresseAgence ;?></span>
                                </li>
                                <li>
                                    <h4 class="card-info-title">Ville</h4>
                                    <span><?= $item->villeAgence ;?></span>
                                </li>
                                </ul>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>

        </section><!-- End Property Grid Single-->

    <?php endif ?>

</main><!-- End #main -->

