
  <main id="main">

  <link rel="stylesheet" href="<?= base_url("assets/login/listMessage.css") ?>">

<!-- ======= Intro Single ======= -->
<section class="intro-single" style="margin-top:-80px">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-8">
        <div class="title-single-box">
          <h1 class="title-single">Liste Message</h1>
          <span class="color-text-a">Chat Application</span>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Intro Single-->

<section>

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?php foreach ($group as $item) : ?>
                    <a href="<?= base_url("Client/Message/index/$item->groupName/$item->emailAgence") ?>">
                        <div class="list" id="list">
                            <div class="col">
                                <p id="paragraph">
                                    <h4><?= $item->groupName ;?></h4>
                                    <small><?= $item->emailAgence ;?></small>
                                </p>
                            </div>
                        </div>
                    </a>

                <?php endforeach ?>
                    
            </div>
        </div>
    </div>
    

</section>

</main><!-- End #main -->

