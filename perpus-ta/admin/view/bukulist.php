<?php include '../inc/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php include '../inc/sidebar.php'; ?>
<?php 
  if (isset($_GET['delBid'])) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delBid']);
    $delB = $b->delBukuById($id);
  }
?>

<!-- Main content -->
<section class="content">
<div class="panel panel-default">
  <div class="panel-heading">
    Daftar Buku
  </div>
  <div class="panel-body">
      <?php if(isset($delB)) {
        echo $delB;
      } ?>
  	<table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
    		<thead>
        <tr>
  	  		<th>No.</th>
  	  		<th>Judul</th>
  	  		<th>Penulis</th>
  	  		<th>Penerbit</th>
  	  		<th>Tahun terbit</th>
          <th>Gambar</th>
  	  		<th>Action</th>
    		</tr>
      </thead>
          <tbody>
        <?php
        $i=0;
        $buku = $b->getAllBuku();
        if ($buku) {
          while ($result = $buku->fetch_assoc()) {
            $i++;
          ?>
        <tr>
    			<td><?php echo $i."."; ?></td>
    			<td width="16%"><?php echo $result['judul']; ?></td>
    			<td width="13%"><?php echo $result['penulis']; ?></td>
    			<td width="13%"><?php echo $result['penerbit']; ?></td>
    			<td><?php echo $result['tahunTerbit']; ?></td>
          <td width="16%"><img width="35%" src="../<?php echo $result['gambar'] ?>"></td>
    			<td width="16%">
    				<a href="../aksi/bukuUpdate.php?bId=<?php echo $result['id']; ?>"><button class="btn-primary btn-sm">Edit</button></a>
            <a onclick="return confirm('Yakin untuk Hapus Data ?')" href="bukulist.php?delBid=<?php echo $result['id']; ?>"><button class="btn-danger btn-sm">Hapus</button></a>
    			</td>
    		</tr>
        <?php } } ?>
      </tbody>
	   </table>
  </div>
</div>
</section>
<?php include '../inc/footer.php'; ?>
