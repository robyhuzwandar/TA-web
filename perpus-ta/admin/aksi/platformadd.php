
<?php include '../inc/header.php'; ?>
<?php include '../inc/sidebar.php'; ?>
<?php 
	$pf = new Platform();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$namaPf = $_POST['namaPf'];
		$insertPf = $pf->insertPf($namaPf);
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
				<form action="" method="post">
					<?php 
						if (isset($insertPf)) {
							echo $insertPf;
						}
					?>
					<div class="form-group">
						<label>Platform</label>
						<input type="text" class="form-control" name="namaPf">
					</div>
					<input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
				</form>
			</div>
		</div>
	</div>
</div>
</section>
<?php include '../inc/footer.php'; ?>