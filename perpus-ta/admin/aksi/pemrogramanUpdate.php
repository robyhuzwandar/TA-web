
<?php include '../inc/header.php'; ?>
<?php include '../inc/sidebar.php'; ?>
<?php 
	if (!isset($_GET['pemrId']) || $_GET['pemrId'] == NULL) {
		echo "<script> window.location = '../view/pemrogramanlist.php';</script>";
	}else{
		$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['pemrId']);
	}
	if ($_SERVER['REQUEST_METHOD'] == 'POST') { //Menghasilkan metode yang dipakai untuk mengakses suatu halaman,EX:POST
		$namaPemr = $_POST['namaPemr'];
		$pemrUpdate = $p->pemrUpdate($namaPemr, $id);
	}
?>
<section class="content">
<div class="panel panel-default">
	<div class="panel-heading">
		Edit Pemrograman
	</div>
		<div class="panel-body">
			<div class="row">
			<div class="col-md-6">
			<?php 
				if (isset($pemrUpdate)) {
					echo $pemrUpdate;
				}
			?>
			<?php
		      $pemr = $p->getPemrById($id);
		      if ($pemr) {
		        while ($result = $pemr->fetch_assoc()) {
		    ?>
				<form action="" method="post">
					<div class="form-group">
						<label>Judul Buku</label>
						<input type="text" class="form-control" value="<?php echo $result['nama'] ?>" name="namaPemr">
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