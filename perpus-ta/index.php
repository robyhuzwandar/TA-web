<?php include 'inc/header.php'; ?>
<?php 
  if (isset($_GET['dpId'])) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['dpId']);
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $addPinjam = $dp->addToDaftarPinjam($id);
    
  }
?>

  <div class="container">
    <div class="card">
      <h5 style="padding: 10px; background: lavender; !importan">Buku Terbaru</h5>
    </div>
    <div class="row">
     <?php
      $buku = $b->getAllBukuLimit();
      if ($buku) {
        while ($result = $buku->fetch_assoc()) {?>
        <div class="col" style="padding: 15px;">
            <div class="card" style="width: 15.9rem;">
              <img class="card-img-top" src="admin/<?php echo $result['gambar'] ?>" height="200px" width="20px" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title"><?php echo $result['judul']; ?></h5>
                <p class="card-text">
                  <hr>
                  Penulis : <?php echo $result['penulis']; ?> <br>
                  Penerbit : <?php echo $result['penerbit']; ?> <br>
                  Tahun terbit : <?php echo $result['tahunTerbit']; ?>
                </p>
                <a href="daftarpinjam.php?dpId=<?php echo $result['id']; ?>"><input type="submit" name="submit" class="btn btn-primary" value="Pinjam" /></a>
              </div>
            </div>
        </div>
        <?php } } ?>
    </div>

    <div class="card">
      <h5 style="padding: 10px; background: lavender; !importan">Baru di Pinjam</h5>
    </div>
    <div class="row">
     <?php
      $buku = $b->getAllBukuPopuler();
      if ($buku) {
        while ($result = $buku->fetch_assoc()) {?>
        <div class="col" style="padding: 15px;">
            <div class="card" style="width: 15.9rem;">
              <img class="card-img-top" src="admin/<?php echo $result['gambar'] ?>" height="200px" width="20px" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title"><?php echo $result['judul']; ?></h5>
                <p class="card-text">
                  <hr>
                  Penulis : <?php echo $result['penulis']; ?> <br>
                  Penerbit : <?php echo $result['penerbit']; ?> <br>
                  Tahun terbit : <?php echo $result['tahunTerbit']; ?>
                </p>
                <a href="daftarpinjam.php?dpId=<?php echo $result['id']; ?>"><input type="submit" name="submit" class="btn btn-primary" value="Pinjam" /></a>
              </div>
            </div>
        </div>
        <?php } } ?>
    </div>
 <?php include 'inc/footer.php'; ?>

