
<?php include '../inc/header.php'; ?>
<?php include '../inc/sidebar.php'; ?>
<?php  

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
	$insertA = $s->insertStaf($_POST, $_FILES);
}

?>

<section class="content">
<div class="panel panel-default">
	<div class="panel-heading">
		Tambah Buku
	</div>
	<div class="panel-body">
	<?php 
		if (isset($insertA)) {
			echo $insertA;
		}
	?>
		<div class="row">
			<div class="col-md-6">
				<form action="" method="post" enctype="multipart/form-data">
					
					<div class="form-group">
						<label>Nama</label>
						<input type="text" class="form-control" name="nama">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" name="email">
					</div>
					<div class="form-group">
						<label>Username</label>
						<input type="text" class="form-control" name="username">
					</div>

					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="password">
					</div>

					<div class="btn-group">
					  <select id="select" name="level">
					  	<option selected="">Pilih Tingkat</option>
					  	<option value="0">Kepala Perpustakaan</option>
					  	<option value="1">Staff</option>
					  </select>
					</div>

					<div class="form-group">
						<br>
						<label>Foto</label>
						<input type="file" class="" name="foto">
					</div>

					<input type="submit" class="btn btn-primary" name="submit" value="Simpan">
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include '../inc/footer.php'; ?>
