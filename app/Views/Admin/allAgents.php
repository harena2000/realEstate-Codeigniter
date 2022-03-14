
  <main id="main">

<!-- ======= Intro Single ======= -->
<section class="intro-single">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-8">
        <div class="title-single-box">
          <h1 class="title-single">All Agents</h1>
          <span class="color-text-a">List of all agents</span>
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
        <th scope="col">Profil</th>
        <th scope="col">Name and Nick name</th>
        <th scope="col">Email</th>
        <th scope="col">Gender</th>
        <th scope="col">Address</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user) : ?>
        <tr>
        <td scope="row"><img src="
                  <?php 
                    if ($user->pdpUser == null) {
                      $avatar = ($user->sexeAgence == 0) ? 
                        base_url('assets/img/User/avatar-male.jpg') : base_url('assets/img/User/avatar-female.jpg') ;
                        echo $avatar;
                    } 
                    else {
                      echo base_url('assets/img/Agence/'.$user->pdpUser);
                    }
                  ?>" class="img-a img-fluid" style="width: auto;height:45px;">
        </td>
        <td><?= $user->nomAgence . " " . $user->prenomAgence ;?></td>
        <td><?= $user->emailUser ;?></td>
        <td><?= $sexe = $user->sexeAgence == 0 ? "Men" : "Women" ;?></td>
        <td><?= $user->adresseAgence .", ". $user->villeAgence ." - ". $user->nomPays ;?></td>
        <td>
          <a href="<?= base_url("Admin/Profilagents/index/".$user->idAgence)?>" class="btn btn-info btn-sm">
          <i class="fas fa-info" aria-hidden="true"></i> Info</a>
        </td>
      </tr>

      <?php endforeach ?>
    </tbody>
    
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();
    });
  </script>

  </table>

  </div>
</section><!-- End Property Single-->

</main><!-- End #main -->

