<?php
  
  if(isset($_POST['btnOk'])){

  $nim = $_POST['nim'];

  foreach($nim as $key => $val){

  echo $nim[$key];

  }

  }

  ?>

<form method="get" name="frm" action="">

  <input name="jumlah" type="text" />

  <input type="submit" name="btnJumlah" value="Ok" />

  </form>

<form method="post" name="frmpost" action="">

  <table width="547" border="0" cellpadding="0" cellspacing="0">

  <!--DWLayoutTable-->

  <tr>

  <td width="114" valign="top">kode Buku</td>

  </tr>

  <?php

  if(isset($_GET['jumlah']) && $_GET['jumlah']>0){

  $jumlah_form = $_GET['jumlah'];

  }

  else{

  $jumlah_form = 1;

  }

  for($i=1; $i<=$jumlah_form; $i++){

  ?>

  <tr>

  <td><input name="nim[]" type="text" size="10" /></td>

  </tr>

  <?php

  }

  ?>

  <tr>

  <td height="23" colspan="4" align="right"><input type="submit" name="btnOk" value="Simpan" /></td>

  </tr>

  </table>

  </form>