
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Toegoe Photography Shop Yogyakarta</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url(); ?>img/logo.jpg" rel="icon">
  <link href="<?php echo base_url(); ?>img/logo.jpg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/venobox/venobox.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url(); ?>css/style4.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: BizLand - v1.2.1
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-envelope"></i> <a href="mailto:contact@example.com">TOEGOEPhotographyShop</a>
        <i class="icofont-phone"></i> 0812345678910
      </div>
      <div class="social-links">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="<?= base_url(); ?>" class="logo mr-auto"><img src="<?php echo base_url(); ?>img/logo.jpg" alt="">TOEGOE Photography<br>Shop Yogyakarta<span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt=""></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="<?= base_url('beranda');?>">Beranda</a></li>
          <li class="drop-down"><a href="<?= base_url('produk'); ?>">Produk</a>
            <ul>
              <li><a href="<?= base_url('keranjang'); ?>">Keranjang</a></li>
              <!-- jika belum login -->
              <li><a href="<?= base_url('checkout'); ?>">Checkout</a></li>
            </ul>
          </li>
          <li><a href="#footer">Tentang Kami</a></li>
          <?php if (isset($pelanggan['email_pelanggan'])): ?>
          <li class="drop-down"><a href="<?= base_url('profil'); ?>"><?= $pelanggan['nama_pelanggan']; ?></a>
            <ul> 
                  <li><a href="<?= base_url('profil'); ?>">Profil</a> </li>
                  <li><a href="<?= base_url('riwayat'); ?>">Riwayat Belanja</a> </li>
                   <li><a href="<?= base_url('logout'); ?>">Logout</a> </li>
           </ul>
          </li>
          <?php endif ?>
          <?php if (!isset($pelanggan['email_pelanggan'])): ?>
          <li><a href="<?php echo base_url('login');?>">Login</a></li>
          <?php endif ?>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->