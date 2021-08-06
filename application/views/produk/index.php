    <main id="main">
    <br><br><br>

      <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">
      <br><br><br>
       <img src="<?=base_url();?>img/bg2.jpg" style="width: 100%; height: 20%" alt=""><br><br>
      <h4 style = "color:#E83029">Semua Produk</h4><hr />
      <br>
      <form action="<?= base_url('pencarian'); ?>" method="post" class="navbar-form navbar-right">
          <input type="text" name="keyword" class="form-control">
          <button class="btn btn-primary">Cari</button>
        </form>
        <br>
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
    <div class="row">
        <div class="col">
            <!--Tampilkan pagination-->
            <?php echo $pagination; ?>
        </div>
    </div>
  </div>
</section>
</main>
