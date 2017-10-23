
<?php include '../inc/header.php'; ?>
<?php include '../inc/sidebar.php'; ?>
<?php  
	if (!isset($_GET['bId']) || $_GET['bId'] == NULL) {
		echo "<script>window.location='../view/bukulist.php'</script>";
	}else{
		$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['bId']);
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
		$updateBuku = $b->updateBuku($_POST, $_FILES, $id);
	}
?>
<section class="content">
<div class="panel panel-default">
	<div class="panel-heading">
		Tambah Buku
	</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6">
				<?php 
					if (isset($updateBuku)) {
						echo $updateBuku;
					}
				?>
				<?php 
					$updateBuku = $b->getBukuById($id);
					if ($updateBuku) {
					while ($result = $updateBuku->fetch_assoc()) {
				?>
				<form action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Judul Buku</label>
						<input type="text" value="<?php echo $result['judul']; ?>" class="form-control" name="judul">
					</div>

					<div class="form-group">
						<label>Penulis</label>
						<input type="text" value="<?php echo $result['penulis'] ?>" class="form-control" name="penulis">
					</div>

					<div class="form-group">
						<label>Penerbit</label>
						<input type="text" value="<?php echo $result['penerbit'] ?>" class="form-control" name="penerbit">
					</div>

					<div class="form-group">
						<label>Tahun terbit</label>
						<input type="text" value="<?php echo $result['tahunTerbit'] ?>" class="form-control" name="thnterbit">
					</div>

					<div class="form-group">
						<label>Stok</label>
						<input type="number" value="<?php echo $result['stok'] ?>" class="form-control" name="stok">
					</div>

					<div class="form-group">
						<label>Kode Rak</label>
						<input type="text" value="<?php echo $result['kodeRak'] ?>" class="form-control" name="kodeRak">
					</div>

					<div class="form-group">
						<label>Kode Kolom</label>
						<input type="text" value="<?php echo $result['kodeKolom'] ?>" class="form-control" name="kodeKolom">
					</div>

					<div class="btn-group">

					  <select id="select" name="pId">
					  	<option selected="">Pilih Bahasa Pemrograman</option>
					  	 <?php
					      $pemr = $p->getAllPemr();
					      if ($pemr) {
					        while ($value = $pemr->fetch_assoc()) {
					      ?>
					  	<option
					  		<?php 
					  			if ($result['pemrograman_id'] == $value['id']) { ?>
					  				selected='selected'	
					  		<?php } ?>
					  	 value="<?php echo $result['pemrograman_id']; ?>"><?php echo $value['nama']; ?></option>
					  	<?php } } ?>
					  </select>
					</div>

					<div class="btn-group">
					  <select id="select" name="platformId">
					  	<option selected="">Pilih Jenis Platform</option>
					  	 <?php
					      $pf = $pf->getAllPf();
					      if ($pemr) {
					        while ($value = $pf->fetch_assoc()) {
					      ?>
					  	<option
					  		<?php if ($result['platform_id'] == $value['id']) { ?>
					  			selected='selected'
					  		<?php } ?>
					  	value="<?php echo $result['platform_id']; ?>"><?php echo $value['nama']; ?></option>
					  	<?php } } ?>
					  </select>
					</div>

					<div class="form-group">
						<br>
						<label>Gambar</label><br>
						<img src="../<?php echo $result['gambar'] ?>" height="45px" width="60px"><br><br>
						<input type="file" class="" name="gambar">
					</div>

					<input type="submit" class="btn btn-primary" name="submit" value="Simpan">
					</form>
					</div>
				</div>
				<?php } } ?>
			</div>
		</div>
	</section>
<?php include '../inc/footer.php'; ?>