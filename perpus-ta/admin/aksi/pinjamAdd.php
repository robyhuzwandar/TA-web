<?php include '../inc/header.php'; ?>
<?php include '../inc/sidebar.php'; ?>
<?php 

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$kodeBuku = $_POST['buku'];
		$add_cart = $t->addToTemp($kodeBuku);
	}

	$staf = Session::get('id');
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$member = $_POST['member'];
		$add_pinjam = $t->addToPinjam($nim, $staf);
	}
	
?>


<section class="content">
<div class="panel panel-default">
	<div class="panel-heading">
		Tambah Buku
	</div>
		<div class="panel-body">
			<form action="" method='post'>
				<div class="row">
					<div class="col-md-4">
					<div class="form-group">
						<label>Nama Buku</label><br>
						<select data-live-search="true" data-live-search-style="startsWith" name="buku" class="selectpicker">
							<option disabled="" selected="">Pilih Buku Berdasarkan Judul</option>
					        <?php
						        $buku = $b->getAllBuku();
						        if ($buku) {
						          while ($result = $buku->fetch_assoc()) {?>
					        <option value="<?php echo $result['kodeBuku'] ?>"><?php echo $result['judul'] ?></option>
					        <?php } } ?>
					    </select>
					</div>
						<div class="form-group"><br>
						<input type="submit" id='insert' class="btn btn-primary simpan" name="submit" value="Add" style="margin-top: 5px;">
						</div>
					</div>
				</div>
			</form>
			<?php 
				if (isset($add_cart)) {
					echo $add_cart;
				}
			?>
			<hr>
			<div class="row">
				<div class="col col-md-6">
					<table class="table table-default">
						<tr>
							<td>No.</td>
							<td>Nama</td>
						</tr>
						<?php 
							$no=0;
							$getCart = $t->getCart();
							if ($getCart) {
								while ($result = $getCart->fetch_assoc()) {
									$no++;
						?>
						<tr>
						<td><?php echo $no; ?></td>
						<td><?php
							$value = $b->getBukuBykodeBuku($result['kodeBuku'])->fetch_assoc();
							echo $value['judul'];
						?></td>		
						</tr>
						<?php } } ?>
					</table>
				</div>
				<div class="col col-md-6">
					<form action="" method='post'>
						<div class="row">
							<div class="col-md-4">
							<div class="form-group">
								<label>Nama Buku</label><br>
								<select data-live-search="true" data-live-search-style="startsWith" name="member" class="selectpicker">
									<option disabled="" selected="">Pilih Member</option>
							        <?php
								        $m = $m->getAllMember();
								        if ($m) {
								          while ($result = $m->fetch_assoc()) {?>
							        <option value="<?php echo $result['nim'] ?>"><?php echo $result['nama'] ?></option>
							        <?php } } ?>
							    </select>
							</div>
								<div class="form-group"><br>
								<input type="submit" id='insert' class="btn btn-primary simpan" name="send" value="Kirim Ke Peminjaman" style="margin-top: 5px;">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
    $("form").submit(function(){
      var formdata = $(this).serialize();
      $.ajax({
       url:'pinjamAdd.php',
       type'POST',
       data:formdata,
       success:function(message){
        alert(message);
       }
      });
      return false;
     });
</script>
<?php include '../inc/footer.php'; ?>