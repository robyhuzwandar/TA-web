
<?php include '../inc/header.php'; ?>
<?php include '../inc/sidebar.php'; ?>
<?php 
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$namaPemr = $_POST['namaPemr'];
		$insertPemr = $p->insertPemr($namaPemr);
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
					<form action="" method="post">
						<?php 
							if (isset($insertPemr)) {
								echo $insertPemr;
							}
						?>
						<div class="form-group">
							<label>Pemrograman</label>
							<input type="text" class="form-control" name="namaPemr">
						</div>
						<input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include '../inc/footer.php'; ?>