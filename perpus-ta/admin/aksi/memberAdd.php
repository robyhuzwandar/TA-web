
<?php include '../inc/header.php'; ?>
<?php include '../inc/sidebar.php'; ?>
<?php  

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
	$insertM = $m->insertMember($_POST, $_FILES);
}

?>

<section class="content">
<div class="panel panel-default">
	<div class="panel-heading">
		Tambah Buku
	</div>
	<div class="panel-body">
	<?php 
		if (isset($insertM)) {
			echo $insertM;
		}
	?>
		<div class="row">
			<div class="col-md-6">
				<form action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Nim</label>
						<input type="text" class="form-control" name="nim">
					</div>
					<div class="form-group">
						<label>Nama</label>
						<input type="text" class="form-control" name="nama">
					</div>

					<div class="form-group">
						<label>Alamat</label>
						<input type="text" class="form-control" name="alamat">
					</div>

					<div class="form-group">
						<label>Tgl Lahir</label>
						<input type="text" class="form-control" name="tanggalLahir">

					<div class="form-group">
						<label>No HP</label>
						<input type="text" class="form-control" name="nohp">
					</div>


					<div class="form-group">
						<label>Email</label>
						<input type="text" class="form-control" name="email">
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
 <script type="text/javascript">
    $(function () {
        $('#datetimepicker5').datetimepicker({
            defaultDate: "11/1/2013",
            disabledDates: [
                moment("12/25/2013"),
                new Date(2013, 11 - 1, 21),
                "11/22/2013 00:53"
            ]
        });
    });
</script>
