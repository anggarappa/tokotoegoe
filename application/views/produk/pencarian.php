
 <main id="main">
    <br><br><br>

      <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">
      <br><br><br>
       <img src="<?=base_url();?>img/bg2.jpg" style="width: 100%; height: 20%" alt=""><br><br>
      <h4 style = "color:#E83029">Semua Produk</h4><hr />
      <br>
      <form <?= base_url('pencarian'); ?> method="post" class="navbar-form navbar-right">
          <input type="text" name="keyword" class="form-control">
          <button class="btn btn-primary">Cari</button>
        </form>
        <br>

		<div class="row">
			
			<?php foreach ($pecah as $value): ?>

			<div class="col-lg-3 col-md-6 d-flex align-items-stretch">
				<div class="member">
              	<div class="member-img">
					<img src="<?php echo base_url(); ?>/foto_produk/<?= $value['foto_produk'];?>" class="img-fluid" alt="">
					<div class="member-info">
						<h3><?php echo $value["nama_produk"] ?></h3>
						<h5><?php echo number_format($value["harga_produk"]) ?></h5>
						<a href="<?= base_url(); ?>produk/beli/<?= $value['id_produk']; ?>" class="btn btn-primary">Beli</a>
                		<a class="btn btn-default" href="<?= base_url(); ?>produk/detail/<?= $value["id_produk"]; ?>">detail</a> 
					</div>
				</div>
			</div>
		</div>
			<?php endforeach; ?>
		
	</div>

</body>
</html>