
<?php include '../inc/header.php'; ?>
<?php include '../inc/sidebar.php'; ?>
<?php  

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
	$insertB = $b->insertBuku($_POST, $_FILES);
}

?>

<section class="content">
<div class="panel panel-default">
	<div class="panel-heading">
		Tambah Buku
	</div>
	<div class="panel-body">
		<?php 
			if (isset($insertB)) {
				echo $insertB;
			}
		?>
		<div class="row">
			<div class="col-md-6">
				<form action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Kode Buku</label>
						<input type="text" class="form-control" name="kodeBuku">
					</div>
					<div class="form-group">
						<label>Judul Buku</label>
						<input type="text" class="form-control" name="judul">
					</div>

					<div class="form-group">
						<label>Penulis</label>
						<input type="text" class="form-control" name="penulis">
					</div>

					<div class="form-group">
						<label>Penerbit</label>
						<input type="text" class="form-control" name="penerbit">
					</div>

					<div class="form-group">
						<label>Tahun terbit</label>
						<input type="text" class="form-control" name="thnterbit">
					</div>

					<div class="form-group">
						<label>Stok</label>
						<input type="number" class="form-control" name="stok">
					</div>

					<div class="form-group">
						<label>Kode Rak</label>
						<input type="text" class="form-control" name="kodeRak">
					</div>

					<div class="form-group">
						<label>Kode Kolom</label>
						<input type="text" class="form-control" name="kodeKolom">
					</div>

					<div class="btn-group">
					  <select id="select" name="pId">
					  	<option selected="">Pilih Bahasa Pemrograman</option>
					  	 <?php
					      $pemr = $p->getAllPemr();
					      if ($pemr) {
					        while ($result = $pemr->fetch_assoc()) {
					      ?>
					  	<option value="<?php echo $result['id']; ?>"><?php echo $result['nama']; ?></option>
					  	<?php } } ?>
					  </select>
					</div>

					<div class="btn-group">
					  <select id="select" name="platformId">
					  	<option selected="">Pilih Jenis Platform</option>
					  	 <?php
					      $pf = $pf->getAllPf();
					      if ($pemr) {
					        while ($result = $pf->fetch_assoc()) {
					      ?>
					  	<option value="<?php echo $result['id']; ?>"><?php echo $result['nama']; ?></option>
					  	<?php } } ?>
					  </select>
					</div>

					<div class="form-group">
						<br>
						<label>Gambar</label>
						<input type="file" class="" name="gambar">
					</div>
					<input type="submit" class="btn btn-primary" name="submit" value="Simpan">
				</form>
			</div>
		</div>
	</div>
</section>
<?php include '../inc/footer.php'; ?>
