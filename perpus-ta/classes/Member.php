<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../lib/Format.php');
?>
<?php 
	
	class Member
	{
		private $db;
		private $fm;
		
		public  function __construct(){
		$this->db = new Database();
		$this->fm = new format();
  		}	

  		public function getAllMember()
	  	{
		  	$query = "SELECT * FROM member ORDER BY id DESC";
		    $result = $this->db->select($query);
		    return $result;
	  	}

	  	public function insertMember($data, $file)
	  	{
	  		$nim = mysqli_real_escape_string($this->db->link, $data['nim']);
	  		$nama = mysqli_real_escape_string($this->db->link, $data['nama']);
	  		$alamat = mysqli_real_escape_string($this->db->link, $data['alamat']);
	  		$tglLahir = mysqli_real_escape_string($this->db->link, $data['tglLahir']);
	  		$nohp = mysqli_real_escape_string($this->db->link, $data['nohp']);
	  		$email = mysqli_real_escape_string($this->db->link, $data['email']);
	  		$password = mysqli_real_escape_string($this->db->link, $data['password']);

	  		$permited = array('jpg', 'jpeg', 'png', 'gif');
		    $file_name = $_FILES['foto']['name'];
		    $file_size = $_FILES['foto']['size'];
		    $file_temp = $_FILES['foto']['tmp_name'];

		    $div = explode('.', $file_name);
		    $file_ext = strtolower(end($div));
		    $unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
		    $upload_image = "images/".$unique_image;

		    if ($file_size > 1048567) {
		    	echo "<span style='color:red;'> Ukuran Foto tidak boleh lebih dari 1MB </span>";
		    }else if(in_array($file_ext, $permited) == false){
		    	echo "<span class='succes'>Hanya bisa Upload Foto dengan type : -".implode(', ', $permited)."</span>";
		    }else{
		    	$query = "SELECT * FROM member WHERE nim='$nim'";
		    	$cekNama = $this->db->select($query);
		    	if ($cekNama) {
		    		$msg = "<span style='color:red;'>Gagal Mendaftar.! nim Sudah Di Gunakan</span>";
					return $msg;
		    	}else{
		    		move_uploaded_file($file_temp, "../".$upload_image);
			    	$query = "INSERT INTO member(nama, alamat, tglLahir, nohp, email, nim, pass, foto) VALUES('$nama', '$alamat', '$tglLahir', '$nohp', '$email', '$nim', '$password', '$upload_image')";
					$insert_row = $this->db->insert($query);
					if ($insert_row) {
						$msg = "<span style='color:green;'> Pendaftaran Berhasil </span>";
						return $msg;
					}else{
						$msg = "<span style='color:red;'> Pendaftaran Gagal </span>";
						return $msg;
					}
		    	}
		    }
	  	}

	  	public function updateMember($data, $file, $id)
	  	{
	  		$nama = mysqli_real_escape_string($this->db->link, $data['nama']);
	  		$alamat = mysqli_real_escape_string($this->db->link, $data['alamat']);
	  		$tglLahir = mysqli_real_escape_string($this->db->link, $data['tglLahir']);
	  		$nohp = mysqli_real_escape_string($this->db->link, $data['nohp']);
	  		$email = mysqli_real_escape_string($this->db->link, $data['email']);
	  		$nim = mysqli_real_escape_string($this->db->link, $data['nim']);
	  		$password = mysqli_real_escape_string($this->db->link, $data['password']);

	  		$permited = array('jpg', 'jpeg', 'png', 'gif');
		    $file_name = $_FILES['foto']['name'];
		    $file_size = $_FILES['foto']['size'];
		    $file_temp = $_FILES['foto']['tmp_name'];

		    $div = explode('.', $file_name);
		    $file_ext = strtolower(end($div));
		    $unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
		    $upload_image = "images/".$unique_image;

	    	$query = "SELECT * FROM member WHERE nim='$nim' AND id != '$id'";
	    	$cekNama = $this->db->select($query);	
	    	if ($cekNama) {
	    		$msg = "<span style='color:red;'>Perubahan Gagal.! nim Sudah Di Gunakan</span>";
				return $msg;
	    	}else{
			    if (!empty($file_name)) {
			    	if ($file_size > 1048567) {
			    	echo "<span style='color:red;'> Ukuran Foto tidak boleh lebih dari 1MB </span>";
				    }else if(in_array($file_ext, $permited) == false){
				    	echo "<span class='succes'>Hanya bisa Upload Foto dengan type : -".implode(', ', $permited)."</span>";
				    }else{
			    		move_uploaded_file($file_temp, "../".$upload_image);
				    	$query = "UPDATE member SET
				    	nama = '$nama', 
				    	alamat = '$alamat', 
				    	tglLahir = '$tglLahir', 
				    	nohp = '$nohp', 
				    	email = '$email', 
				    	nim = '$nim',
				    	pass = '$password',
				    	foto = '$upload_image'
				    	WHERE id = '$id'";
						$insert_row = $this->db->update($query);
						if ($insert_row) {
							$msg = "<span style='color:green;'> Pendaftaran Berhasil </span>";
							return $msg;
						}else{
							$msg = "<span style='color:red;'> Pendaftaran Gagal </span>";
							return $msg;
						}
				    }
			    }else{
		    		$query = "UPDATE member SET
			    	nama = '$nama', 
			    	alamat = '$alamat', 
			    	tglLahir = '$tglLahir', 
			    	nohp = '$nohp', 
			    	email = '$email', 
			    	nim = '$nim',
			    	pass = '$password'
			    	WHERE id = '$id'";
					$insert_row = $this->db->update($query);
					if ($insert_row) {
						$msg = "<span style='color:green;'> Perubahan Berhasil </span>";
						return $msg;
					}else{
						$msg = "<span style='color:red;'> Perubahan Gagal </span>";
						return $msg;
					}
			    }
			}
	  	}

	public function getMById($id)
  	{
	  	$query = "SELECT * FROM member WHERE id='$id'";
	    $result = $this->db->select($query);
	    return $result;
  	}

  	public function delMById($id)
  	{
  		$query = "DELETE FROM member WHERE id='$id'";
	    $delete_row = $this->db->delete($query);
	    if ($delete_row) {
	    	$msg = "<span style='color:green'>Data Berhasil di Hapus </span>";
	    	return $msg;
	    }else {
	    	$msg = "<span style='color:red;'>Data Gagal di Hapus </span>";
	    	return $msg;
  		}
  	}

  	public function getJmM()
  	{
  		$query = "SELECT COUNT(*) FROM member";
		$return = $this->db->select($query);
		return $return;
  	}

  	public function memberlogin($data)
  	{
  		$nim = mysqli_real_escape_string($this->db->link, $data['nim']);
  		$pass = mysqli_real_escape_string($this->db->link, $data['pass']);

  		$query = "SELECT * FROM member WHERE nim='$nim' AND pass='$pass'";
  		$result = $this->db->select($query);
        if ($result != false) {
          $value = $result->fetch_assoc();
          Session::set("memberLogin", true);
          Session::set("id", $value['id']);
          Session::set("nama", $value['nama']);
          header("Location: index.php");
        }else{
           $msg = "<span style='color:red;' class='error'>nim Atatu Password Salah !</span>";
            return $msg;
        }
  	}

  	public function searchMember($cari)
  	{
  		$query = "SELECT * FROM member WHERE nama='%$cari%' OR nim='%cari%";
  		$result = $this->db->select($query);
  		return $result;
  	}

}
?>