<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../lib/Format.php');
?>
<?php 
	
	class Buku
	{
		private $db;
		private $fm;
		
		public  function __construct(){
		$this->db = new Database();
		$this->fm = new format();
  		}	

  		public function getAllBuku()
	  	{
		  	$query = "SELECT * FROM buku ORDER BY kodeBuku DESC";
		    $result = $this->db->select($query);
		    return $result;
	  	}

	  	public function getAllBukuLimit()
	  	{
	  		$query = "SELECT * FROM buku ORDER BY kodeBuku DESC LIMIT 8";
		    $result = $this->db->select($query);
		    return $result;	
	  	}

	  	public function getAllBukuPopuler()
	  	{
	  		$query = "SELECT * FROM buku ORDER BY kodeBuku DESC LIMIT 4";
		    $result = $this->db->select($query);
		    return $result;	
	  	}

	  	public function insertBuku($data, $file)
	  	{
	  		$kodeBuku = mysqli_real_escape_string($this->db->link, $data['kodeBuku']);
	  		$judul = mysqli_real_escape_string($this->db->link, $data['judul']);
	  		$penulis = mysqli_real_escape_string($this->db->link, $data['penulis']);
	  		$penerbit = mysqli_real_escape_string($this->db->link, $data['penerbit']);
	  		$thnterbit = mysqli_real_escape_string($this->db->link, $data['thnterbit']);
	  		$stok = mysqli_real_escape_string($this->db->link, $data['stok']);
	  		$kodeRak = mysqli_real_escape_string($this->db->link, $data['kodeRak']);
	  		$kodeKolom = mysqli_real_escape_string($this->db->link, $data['kodeKolom']);
	  		$pkodeBuku = mysqli_real_escape_string($this->db->link, $data['pkodeBuku']);
	  		$platformkodeBuku = mysqli_real_escape_string($this->db->link, $data['platformkodeBuku']);

	  		$permited = array('jpg', 'jpeg', 'png', 'gif');
		    $file_name = $_FILES['gambar']['name'];
		    $file_size = $_FILES['gambar']['size'];
		    $file_temp = $_FILES['gambar']['tmp_name'];

		    $div = explode('.', $file_name);
		    $file_ext = strtolower(end($div));
		    $unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
		    $upload_image = "images/".$unique_image;

		    if ($file_size > 1048567) {
		    	echo "<span style='color:red;'> Ukuran Gambar tkodeBukuak boleh lebih dari 1MB </span>";
		    }else if(in_array($file_ext, $permited) == false){
		    	echo "<span class='succes'>Hanya bisa Upload Gambar dengan type : -".implode(', ', $permited)."</span>";
		    }else{
		    	move_uploaded_file($file_temp, "../".$upload_image);
		    	$query = "INSERT INTO buku(kodeBuku, judul, penulis, penerbit, tahunTerbit, gambar, kodeRak, kodeKolom, platform_kodeBuku, pemrograman_kodeBuku, stok) VALUES('$kodeBuku', '$judul', '$penulis', '$penerbit', '$thnterbit', '$upload_image', '$kodeRak', '$kodeKolom', '$platformkodeBuku', '$pkodeBuku', $stok)";
				$insert_row = $this->db->insert($query);
				if ($insert_row) {
					$msg = "<span style='color:green;'> Buku Berhasil di simpan </span>";
					return $msg;
				}else{
					$msg = "<span style='color:red;'> Buku Gagal di simpan </span>";
					return $msg;
				}
		    }
	  	}

	  	public function updateBuku($data, $file, $kodeBuku)
	  	{
	  		$kodeBuku = mysqli_real_escape_string($this->db->link, $data['kodeBuku']);
	  		$judul = mysqli_real_escape_string($this->db->link, $data['judul']);
	  		$penulis = mysqli_real_escape_string($this->db->link, $data['penulis']);
	  		$penerbit = mysqli_real_escape_string($this->db->link, $data['penerbit']);
	  		$thnterbit = mysqli_real_escape_string($this->db->link, $data['thnterbit']);
	  		$stok = mysqli_real_escape_string($this->db->link, $data['stok']);
	  		$kodeRak = mysqli_real_escape_string($this->db->link, $data['kodeRak']);
	  		$kodeKolom = mysqli_real_escape_string($this->db->link, $data['kodeKolom']);
	  		$pkodeBuku = mysqli_real_escape_string($this->db->link, $data['pkodeBuku']);
	  		$platformkodeBuku = mysqli_real_escape_string($this->db->link, $data['platformkodeBuku']);

	  		$permited = array('jpg', 'jpeg', 'png', 'gif');
		    $file_name = $_FILES['gambar']['name'];
		    $file_size = $_FILES['gambar']['size'];
		    $file_temp = $_FILES['gambar']['tmp_name'];

		    $div = explode('.', $file_name);
		    $file_ext = strtolower(end($div));
		    $unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
		    $upload_image = "images/".$unique_image;

		    if (!empty($file_name)) {
			    if ($file_size > 1048567) {
			    	echo "<span style='color:red;'> Ukuran Gambar tkodeBukuak boleh lebih dari 1MB </span>";
			    }else if(in_array($file_ext, $permited) == false){
			    	echo "<span class='succes'>Hanya bisa Upload Gambar dengan type : -".implode(', ', $permited)."</span>";
			    }else{
			    	move_uploaded_file($file_temp, "../".$upload_image);
			    	$query = "UPDATE  buku SET
			    	kodeBuku = '$kodeBuku',
			    	judul = '$judul',
			    	penulis = '$penulis',
			    	penerbit = '$penerbit',
			    	tahunTerbit = '$thnterbit',
			    	stok = '$stok',
			    	kodeRak = '$kodeRak',
			    	kodeKolom = '$kodeKolom',
			    	gambar = '$upload_image',
			    	platform_kodeBuku = '$platformkodeBuku',
			    	pemrograman_kodeBuku = '$pkodeBuku'
			    	WHERE kodeBuku='$kodeBuku'";
					$insert_row = $this->db->update($query);
					if ($insert_row) {
						$msg = "<span style='color:green;'> Buku Berhasil di simpan </span>";
						return $msg;
					}else{
						$msg = "<span style='color:red;'> Buku Gagal di simpan </span>";
						return $msg;
					}
			    }
			}else{
				$query = "UPDATE  buku SET
					kodeBuku = '$kodeBuku',
			    	judul = '$judul',
			    	penulis = '$penulis',
			    	penerbit = '$penerbit',
			    	tahunTerbit = '$thnterbit',
			    	stok = '$stok',
			    	kodeRak = '$kodeRak',
			    	kodeKolom = '$kodeKolom',
			    	platform_kodeBuku = '$platformkodeBuku',
			    	pemrograman_kodeBuku = '$pkodeBuku'
			    	WHERE kodeBuku='$kodeBuku'";
					$insert_row = $this->db->update($query);
					if ($insert_row) {
						$msg = "<span style='color:green;'> Buku Berhasil di Update </span>";
						return $msg;
					}else{
						$msg = "<span style='color:red;'> Buku Gagal di Update </span>";
						return $msg;
					}
			}
	  	}

	public function getBukuBykodeBuku($kodeBuku)
  	{
	  	$query = "SELECT * FROM buku WHERE kodeBuku='$kodeBuku'";
	    $result = $this->db->select($query);
	    return $result;
  	}

  	public function delBukuBykodeBuku($kodeBuku)
  	{
  		$query = "DELETE FROM buku WHERE kodeBuku='$kodeBuku'";
	    $delete_row = $this->db->delete($query);
	    if ($delete_row) {
	    	$msg = "<span style='color:green'>Data Berhasil di Hapus </span>";
	    	return $msg;
	    }else {
	    	$msg = "<span style='color:red;'>Data Gagal di Hapus </span>";
	    	return $msg;
  		}
  	}

  	public function getJmBuku()
  	{
		$query = "SELECT COUNT(*) FROM buku";
		$return = $this->db->select($query);
		return $return;
  	}

	}
?>