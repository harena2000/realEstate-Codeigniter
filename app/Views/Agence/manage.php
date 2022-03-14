
  <main id="main">

<!-- ======= Intro Single ======= -->
<section class="intro-single">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-8">
        <div class="title-single-box">
          <h1 class="title-single">Purchasing System</h1>
          <span class="color-text-a">Management of all Purchases</span>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Intro Single-->

<!-- ======= Property Single ======= -->
<section class="property-single nav-arrow-b">
  <div class="container">
  <table class="table table-hover" id="myTable">
    <thead style="background-color: #26A356;color:white;">
      <tr>
        <th scope="col">PROFIL</th>
        <th scope="col">CHECK LIST</th>
        <th scope="col">CONTRACTS</th>
        <th scope="col">STATUS</th>
      </tr>
    </thead>
    <tbody>
      <?php

      use CodeIgniter\I18n\Time;

      foreach ($proprety as $contrat) : ?>
        <tr>
        <td><img src="<?php 
              if ($contrat->pdpUser == null) {
                  $avatar = ($contrat->sexe == 0) ? 
                  base_url('assets/img/User/avatar-male.jpg') : base_url('assets/img/User/avatar-female.jpg') ;
                  echo $avatar;
              } 
              else {
                  echo base_url('assets/img/User/'.$contrat->pdpUser);
              }?>" class="img-a img-fluid" style="width: 150px;heigth:auto">
        </td>
        <td><?= "<strong>House name : </strong>" . $contrat->nomMaison ;?>
          <?= "<br><strong>Client : </strong>" . $contrat->nomClient ." ". $contrat->prenomClient ;?>
          <?= "<br><strong>Left : </strong>" . number_format($contrat->reste) ;?> Ar
          <br><br>
          <a href="<?= base_url("Agence/Profilclient/index/"."/".$contrat->idClient) ?>" class="btn btn-success btn-lg">
          <i class="fas fa-info" aria-hidden="true"></i> Information</a>
          <td>
            <?= "<strong>Contract Start : </strong>" . $contrat->debutContrat ;?>
            <?= "<br><strong>Contract End : </strong>" . $contrat->finContrat ;?>
            <?= "<br><strong>Contract Years : </strong>" . $contrat->contrat . " years" ;?>
            <br><br>

              <?php 

          // Check if the hous is totally paid
              
          if ($contrat->reste != 0) {

            echo "<h1 style='color: red;'>Not Done</h1>";
              
          }else {?>
            <h1 style="color: green;">Done</h1>
          <?php } ?>
      </td>
      <td>          
      <br><br><?= $stat = ($contrat->reste == 0) ? "Complete" : "Not Done";?></td>

      </tr>

      <?php endforeach ?>
    </tbody>
  </table>
  </div>
</section><!-- End Property Single-->

</main><!-- End #main -->

