<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADMIN</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="<?= base_url(); ?>/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="<?= base_url(); ?>/ssets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="<?= base_url(); ?>/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="<?= base_url(); ?>/assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-dark bg-dark" role="navigation" style="margin-bottom: 0">
            <div class="p-3 mb-2 bg-dark text-white">
                <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button> -->
                <strong><a class="navbar-brand" href="index.php">Admin Toegoe Camera</a> </strong>
                <!-- <label><h3> Admin Teratai </h3></label> -->
            </div>
            
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"><?php echo "Last access : ".date("d F Y H:i:s."); ?> &nbsp; 
<a href="<?=base_url('admin/logout'); ?>" class="btn btn-danger square-btn-adjust fa fa-sign-out"> Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <!-- <img src="assets/img/find_user.png" class="user-image img-responsive"/> -->
					</li>
	
                    <li><a href="<?= base_url('admin/index'); ?>"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="<?= base_url(); ?>admin/index?halaman=produk"><i class="fa fa-th-large"></i> Produk</a></li>
                    <li><a href="<?= base_url(); ?>admin/index?halaman=pembelian"><i class="fa fa-shopping-cart"></i> Pembelian</a></li>
                    <li><a href="<?= base_url(); ?>admin/index?halaman=laporan_pembelian"><i class="fa fa-file-text-o"></i> Laporan</a></li>
                    <li><a href="<?= base_url(); ?>admin/index?halaman=pelanggan"><i class="fa fa-user"></i> Pelanggan</a></li>
                    <!-- <li><a href="index.php?halaman=logout"><i class="fa fa-sign-out"></i> Logout</a></li> -->

                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <?php 
                if (isset($_GET['halaman']))
                {
                    if ($_GET['halaman']=="produk")
                    {
                        $this->load->view('admin/produk');
                    }
                    elseif ($_GET['halaman']=="pembelian")
                    {
                        $this->load->view('produk/pembelian');
                    }
                    elseif ($_GET['halaman']=="pelanggan")
                    {
                        $this->load->view('admin/pelanggan');
                    }
                    elseif ($_GET['halaman']=="detail")
                    {
                         $this->load->view('admin/detail');
                    }
                    elseif ($_GET['halaman']=="tambahproduk")
                    {
                       $this->load->view('produk/tambahproduk');
                    }
                    elseif ($_GET['halaman']=="tambahpelanggan")
                    {
                         $this->load->view('admin/tambahpelanggan');
                    }
                    elseif ($_GET['halaman']=="hapusproduk")
                    {
                        $this->load->view('admin/hapusproduk');
                    }
                     elseif ($_GET['halaman']=="hapuspelanggan")
                    {
                         $this->load->view('admin/hapuspelanggan');
                    }
                    elseif ($_GET['halaman']=="ubahproduk")
                    {
                        $this->load->view('produk/ubahproduk');
                    }
                    elseif ($_GET['halaman']=="logout")
                    {
                        include 'logout.php';
                    }
                    elseif ($_GET['halaman']=="pembayaran")
                    {
                       $this->load->view('admin/pembayaran');
                    }
                    elseif ($_GET['halaman']=="laporan_pembelian")
                    {
                       $this->load->view('produk/laporan_pembelian');
                    }
                }
                else{
                    $this->load->view('admin/home');
                }
                ?>
            </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="<?= base_url(); ?>/assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?= base_url(); ?>/assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?= base_url(); ?>/assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="<?= base_url(); ?>/assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="<?= base_url(); ?>/assets/js/custom.js"></script>
    
   
</body>
</html>
