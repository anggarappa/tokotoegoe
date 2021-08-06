    <main id="main">
          
    <section id="team" class="team section-bg">
      <div class="container"><br><br><br>
        <img src="<?=base_url();?>img/bg2.jpg" style="width: 100%; height: 20%" alt=""><br><br>
        <div class="row">
           <?php foreach ($detail as $detail) : ?>
          <div class="col-md-6">
            <center><img src="<?php echo base_url(); ?>/foto_produk/<?= $detail['foto_produk'];?>" class="img-fluid" alt=""></center>
          </div>
          <div class="col-md-6">
            <br><br><br><br><br>
            <h4 style="color: color:#E83029"><?php echo $detail["nama_produk"] ?></h4>
            <p>Rp. <?php echo number_format($detail["harga_produk"]); ?></p>
            <p>Stok : <?php echo $detail['stok_produk'] ?></p>

            <form method="post">
              <div class="form-group">
              <div class="input-group">
                <input type="number" min="1" class="form-control" name="jumlah" max="<?php echo $detail['stok_produk'] ?>">
              <div class="input-group-btn">
                <button class="btn btn-primary" name="beli">Beli</button>
              </div>
              </div>
            </div>
            </form>
          </div>
          <?php
          if (isset($_POST["beli"])) 
        {
          // mendapatkan jumlah yang diinputkan
          $jumlah = $_POST["jumlah"];
          $data = array(
              'id' => $detail['id_produk'],
              'name' => $detail['nama_produk'],
              'price' => $detail['harga_produk'],
              'qty' => $jumlah
          );
          $d = $this->cart->insert($data);
          redirect('produk/keranjang');
        }
        ?>


        <div class="col-md-12">
          <br><hr /><br>
          <h4>Deskripsi</h4>
           <p><?php echo $detail["deskripsi_produk"]; ?></p>
          <br><hr /><br>
        </div>
        <?php endforeach; ?>
      </div>

      <h4>Produk Lainnya </h4>
    <div class="row">
    <?php foreach ($popular as $pop) : ?>
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <div class="member-img">
                <img src="<?php echo base_url(); ?>img/canon.png" class="img-fluid" alt="">
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
    </section>
            

      