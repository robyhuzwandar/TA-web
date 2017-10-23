<?php include '../inc/header.php'; ?>
<?php include '../inc/sidebar.php'; ?>
<?php
	if (!isset($_GET['pfId']) || $_GET['pfId'] == NULL) {
		echo "<script> window.location = '../view/platformlist.php';</script>";
	}else{
		$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['pfId']);
	}
	if ($_SERVER['REQUEST_METHOD'] == 'POST') { //Menghasilkan metode yang dipakai untuk mengakses suatu halaman,EX:POST
		$namaPf = $_POST['namaPf'];
		$pfUpdate = $p->pemrUpdate($namaPf, $id);
	}
?>

<section class="content">
<div class="panel panel-default">	
	<div class="panel-heading">
		Tambah Platform
	</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6">
					<?php 
					if (isset($pfUpdate)) {
						echo $pfUpdate;
					}
					?>
					<?php
				      $pf = $pf->getPfById($id);
				      if ($pf) {
				        while ($result = $pf->fetch_assoc()) {
				    ?>
					<form action="" method="post">
						<div class="form-group">
							<label>Platform</label>
							<input type="text" value="<?php echo $result['nama']; ?>" class="form-control" name="namaPf">
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