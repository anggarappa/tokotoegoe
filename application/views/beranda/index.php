 <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <div class="d-flex">
      </div>
    </div>
  </section><!-- End Hero -->
  
  <main id="main">
    <br><br><br>
      <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">
      <h4 style = "color:#E83029">New Product </h4><hr />
      <p style="text-align:right; color:#E83029"><a href="<?= base_url('produk'); ?>">Lainnya</a></p>
       <div class="row">
        <?php foreach ($produk as $produk) : ?>
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <div class="member-img">
                <img src="<?php echo base_url(); ?>/foto_produk/<?= $produk['foto_produk'];?>" class="img-fluid" alt="">
              <div class="member-info">
                <h4><?php echo $produk['nama_produk']; ?></h4>
                <span>Rp. <?php echo number_format($produk['harga_produk']); ?></span>
                <a href="<?= base_url(); ?>beli-produk/<?= $produk['id_produk']; ?>" class="btn btn-primary">Beli</a>
                <a class="btn btn-default" href="<?= base_url(); ?>detail-produk/<?= $produk["id_produk"]; ?>">detail</a>
              </div>
            </div>
          </div>
        
    </div>
    <?php endforeach; ?>
    </div>
    <br>
    <h4 style = "color:#E83029">Popular Product </h4><hr />
    <p style="text-align:right; color:#E83029"><a href="<?= base_url('produk'); ?>">Lainnya</a></p>
    <div class="row">
    <?php foreach ($popular as $pop) : ?>
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <div class="member-img">
                <img src="<?php echo base_url(); ?>/foto_produk/<?= $produk['foto_produk'];?>" class="img-fluid" alt="">
              <div class="member-info">
                <h4><?php echo $pop['nama_produk']; ?></h4>
                <span>Rp. <?php echo number_format($pop['harga_produk']); ?></span>
                <a href="<?= base_url(); ?>beli-produk/<?= $pop['id_produk']; ?>" class="btn btn-primary">Beli</a>
                <a class="btn btn-default" href="<?= base_url(); ?>detail-produk/<?= $pop["id_produk"]; ?>">detail</a>
              </div>
            </div>
          </div>
        
    </div>
    <?php endforeach; ?>
  </div>


</div>
</section>

  </main><!-- End #main -->