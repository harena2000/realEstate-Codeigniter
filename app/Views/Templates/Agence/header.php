<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $title ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url("assets/img/favicon.png")?>" rel="icon">
  <link href="<?php echo base_url("assets/img/apple-touch-icon.png")?>" rel="apple-touch-icon">
  
  <link href="<?= base_url("assets/style/animate.css/animate.min.css") ;?>" rel="stylesheet">
  <link href="<?= base_url("assets/style/bootstrap/css/bootstrap.min.css") ;?>" rel="stylesheet">
  <link href="<?= base_url("assets/style/bootstrap-icons/bootstrap-icons.css") ;?>" rel="stylesheet">
  <link href="<?= base_url("assets/swiper/swiper-bundle.min.css") ;?>" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <!-- <link href="<?php // echo base_url("assets/bootstrap.min.css")?>" rel="stylesheet"> -->
  <link href="<?php echo base_url("static/styles/fontawesome/css/all.min.css")?>" rel="stylesheet">
  <!-- <link href="<?php //echo base_url("assets/ionicons.min.css")?>" rel="stylesheet"> -->
  <!-- <link href="<?php // echo base_url("assets/animate.min.css")?>" rel="stylesheet"> -->
  <link href="<?php echo base_url("assets/font-awesome.min.css")?>" rel="stylesheet">
  <link href="<?php echo base_url("assets/assets/owl.carousel.min.css")?>" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url("assets/Alert/dist/sweetalert2.min.css")?>">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url("assets/css/style.css")?>" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url("assets/modal/css/ionicons.min.css")?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/modal/css/style.css")?>">
  
  <script src="<?php echo base_url("assets/Alert/dist/sweetalert2.all.min.js")?>"></script>
  <script src="<?php echo base_url("assets/Alert/dist/sweetalert2.min.js")?>"></script>

  <link rel="stylesheet" href="<?php echo base_url("assets/alertify/css/alertify.min.css")?>">
  <script src="<?php echo base_url("assets/alertify/alertify.min.js")?>"></script>
  <script src="<?php echo base_url("assets/cleave.js")?>"></script>
  <script src="<?php echo base_url("assets/cleave-phone.i18n.js")?>"></script>

</head>
<body>

  <!-- ======= Header/Navbar ======= -->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="<?php echo base_url('Client/Acceuil')?>">Estate<span class="color-b">Agency</span></a>
      <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fas fa-search" aria-hidden="true"></span>
      </button>
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
            <button onclick="alertSearch()" type="button" class="btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse">
              <i class="bi bi-search"></i>
            </button>
          <li class="nav-item">
            <a class="nav-link <?php if($isActive == 1) echo 'active'; else echo '' ?>" href="<?php echo base_url('Agence/Acceuil')?>"><i class="fas fa-home" aria-hidden="true"></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($isActive == 2) echo 'active'; else echo '' ?>" href="<?php echo base_url('Agence/Agenda')?>"><i class="fas fa-calendar" aria-hidden="true"></i> Agenda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($isActive == 3) echo 'active'; else echo '' ?>" href="<?php echo base_url('Agence/Manage')?>">$€ Check List</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link <?php if($isActive == 4) echo 'active'; else echo '' ?> dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-home" aria-hidden="true"></i> House
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo base_url('Agence/Newhouse')?>"><i class="fas fa-plus" aria-hidden="true"></i> Add House</a>
              <a class="dropdown-item" href="<?php echo base_url('Agence/Allhouse')?>"><i class="fas fa-home" aria-hidden="true"></i> All House</a>
              <a class="dropdown-item" href="<?php echo base_url('Agence/Sale')?>">€ For Sale</a>
              <a class="dropdown-item" href="<?php echo base_url('Agence/Housesold')?>"><i class="fas fa-folder-open" aria-hidden="true"></i> House Sold</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($isActive == 6) echo 'active'; else echo '' ?>" href="<?php echo base_url('Agence/Listmessage')?>">Chat</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link <?php if($isActive == 5) echo 'active'; else echo '' ?> dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-cog" aria-hidden="true"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo base_url('Agence/Profil/')?>"><i class="fas fa-user" aria-hidden="true"></i> My Profil</a>
              <a class="dropdown-item" href="<?php echo base_url('Agence/Profil/AccountSetting')?>"><i class="fas fa-cogs" aria-hidden="true"></i> Account Setting</a>
            </div>
          </li>
          <li class="nav-item">
            <a style="color: white;" onclick="confirmation()" class="btn btn-success btn-lg">
            <i class="fas fa-power-off" aria-hidden="true"></i>
              Log Out</a>
          </li>
          <script>
          
          function confirmation() { 
            Swal.fire({
              title: 'Are you sure?',
              text: "Do you want to Log out?",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes!'
              }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = "<?= base_url('Login/logout') ?>";
                  }
              })
          }

          </script>

        </ul>
      </div>
    </div>
  </nav><!-- End Header/Navbar -->

  <script type="text/javascript">

  function alertSearch() {
    Swal.fire({
      title: 'Type the keyword to search!',
      input: 'text',
      inputAttributes: {
          autocapitalize: 'off'
      },
      showCancelButton: true,
      confirmButtonText: 'Search',
      showLoaderOnConfirm: true,
      preConfirm: (title) => {
          if (title != "") {
            return fetch(location.href = "<?= base_url("Agence/Search/index") ?>" + "/" + title)
          }
          else
          {
            Swal.showValidationMessage("Type to search")
          }
      },

      allowOutsideClick: () => !Swal.isLoading()
      }).then((result) => {
          if (result.isConfirmed) {
              const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000,
              timerProgressBar: true,
                  didOpen: (toast) => {
                      toast.addEventListener('mouseenter', Swal.stopTimer)
                      toast.addEventListener('mouseleave', Swal.resumeTimer)
                  }
              })
                Toast.fire({
                icon: 'info',
                title: 'Search Loading'
            })
          }
      })
  }

</script>