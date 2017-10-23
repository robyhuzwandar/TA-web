
<?php include '../inc/header.php'; ?>
<?php include '../inc/sidebar.php'; ?>
<?php  
	if (!isset($_GET['mId']) || $_GET['mId'] == NULL) {
		echo "<script>window.location='../view/memberlist.php'</script>";
	}else{
		$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['mId']);
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
		$updateMember = $m->updateMember($_POST, $_FILES, $id);
	}
?>

<section class="content">
<div class="panel panel-default">
	<div class="panel-heading">
		Tambah Buku
	</div>
	<div class="panel-body">
	<?php 
		if (isset($updateMember)) {
			echo $updateMember;
		}
	?>
		<div class="row">
			<div class="col-md-6">
			<?php
			    $m = $m->getMById($id);
			    if ($m) {
			      while ($result = $m->fetch_assoc()) {
		    ?>
				<form action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Nim</label>
						<input type="text" value="<?php echo $result['nim'] ?>" class="form-control" name="nim">
					</div>
					<div class="form-group">
						<label>Nama</label>
						<input type="text" value="<?php echo $result['nama'] ?>" class="form-control" name="nama">
					</div>

					<div class="form-group">
						<label>Alamat</label>
						<input type="text" value="<?php echo $result['alamat'] ?>" class="form-control" name="alamat">
					</div>

					<div class="form-group">
						<label>Tgl Lahir</label>
						<input type="text" value="<?php echo $result['tglLahir'] ?>" class="form-control" name="tglLahir">
					</div>

					<div class="form-group">
						<label>No HP</label>
						<input type="text" value="<?php echo $result['nohp'] ?>" class="form-control" name="nohp">
					</div>


					<div class="form-group">
						<label>Email</label>
						<input type="text" value="<?php echo $result['email'] ?>" class="form-control" name="email">
					</div>

					<div class="form-group">
						<label>Password</label>
						<input type="text" value="<?php echo $result['pass'] ?>" class="form-control" name="password">
					</div>

					<div class="form-group">
						<br>
						<label>Foto</label>
						<img src="../<?php echo $result['foto'] ?>" height="45px" width="60px"><br><br>
						<input type="file" class="" name="foto">
					</div>

					<input type="submit" class="btn btn-primary" name="submit" value="Simpan">
					</form>
					<?php } } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include '../inc/footer.php'; ?>
