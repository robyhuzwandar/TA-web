<?php include '../inc/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php include '../inc/sidebar.php'; ?>
<?php 
  if (isset($_GET['delMid'])) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delMid']);
    $delM = $m->delMById($id);
  }
?>

<!-- Main content -->
<section class="content">
<div class="panel panel-default">
  <div class="panel-heading">
    Daftar Buku
  </div>
  <div class="panel-body">
      <?php if(isset($delM)) {
        echo $delM;
      } ?>
  	<table class="table table-striped display" id="example" width="100%" cellspacing="0">
    		<thead>
        <tr>
  	  		<th>No.</th>
  	  		<th>Nim</th>
          <th>Nama</th>
          <th>ALamat</th>
          <th>Tgl lahir</th>
          <th>No HP</th>
          <th>Email</th>
          <th>Foto</th>
          <th>Action</th>
    		</tr>
        </thead>
          <tbody>
        <?php
        $i=0;
        $member = $m->getAllMember();
        if ($member) {
          while ($result = $member->fetch_assoc()) {
            $i++;
          ?>
        <tr>
    			<td><?php echo $i."."; ?></td>
          <td width="13%"><?php echo $result['nim']; ?></td>
          <td width="16%"><?php echo $result['nama']; ?></td>
          <td width="13%"><?php echo $result['alamat']; ?></td>
          <td width="13%"><?php echo $result['tglLahir']; ?></td>
          <td width="13%"><?php echo $result['nohp']; ?></td>
          <td width="13%"><?php echo $result['email']; ?></td>
          <td width="16%"><img width="35%" src="../<?php echo $result['foto'] ?>"></td>
    			<td width="16%">
    				<a href="../aksi/memberUpdate.php?mId=<?php echo $result['id']; ?>"><button class="btn-primary btn-sm">Edit</button></a>
            <a onclick="return confirm('Yakin untuk Hapus Data ?')" href="memberlist.php?delMid=<?php echo $result['id']; ?>"><button class="btn-danger btn-sm">Hapus</button></a>
    			</td>
    		</tr>
        <?php } } ?>
        </tbody>
	   </table>
  </div>
</div>
</section>
<?php include '../inc/footer.php'; ?>