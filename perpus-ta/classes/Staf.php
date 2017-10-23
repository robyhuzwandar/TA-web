<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');

	class Staf
	{
		private $db;
		
		function __construct()
		{
			$this->db = new Database();
		}


	public function getAllstaf()
	  	{
		  	$query = "SELECT * FROM staf ORDER BY id DESC";
		    $result = $this->db->select($query);
		    return $result;
	  	}

	  	public function insertstaf($data, $file)
	  	{
	  		$nama = mysqli_real_escape_string($this->db->link, $data['nama']);
	  		$email = mysqli_real_escape_string($this->db->link, $data['email']);
	  		$username = mysqli_real_escape_string($this->db->link, $data['username']);
	  		$password = mysqli_real_escape_string($this->db->link, md5($data['password']));
	  		$level = mysqli_real_escape_string($this->db->link, $data['level']);

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
		    	$query = "SELECT * FROM staf WHERE user='$username'";
		    	$cekNama = $this->db->select($query);
		    	if ($cekNama) {
		    		$msg = "<span style='color:red;'>Gagal Mendaftar.! Username Sudah Di Gunakan</span>";
					return $msg;
		    	}else{
		    		move_uploaded_file($file_temp, "../".$upload_image);
			    	$query = "INSERT INTO staf(nama, email, user, pass, foto, level) VALUES('$nama', '$email', '$username', '$password', '$upload_image','$level')";
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

	  	public function updateStaf($data, $file, $id)
	  	{
	  		$nama = mysqli_real_escape_string($this->db->link, $data['nama']);
	  		$email = mysqli_real_escape_string($this->db->link, $data['email']);
	  		$username = mysqli_real_escape_string($this->db->link, $data['username']);
	  		$password = mysqli_real_escape_string($this->db->link, $data['password']);

	  		$permited = array('jpg', 'jpeg', 'png', 'gif');
		    $file_name = $_FILES['foto']['name'];
		    $file_size = $_FILES['foto']['size'];
		    $file_temp = $_FILES['foto']['tmp_name'];

		    $div = explode('.', $file_name);
		    $file_ext = strtolower(end($div));
		    $unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
		    $upload_image = "images/".$unique_image;

	    	$query = "SELECT * FROM staf WHERE user='$username' AND id != '$id'";
	    	$cekNama = $this->db->select($query);	
	    	if ($cekNama) {
	    		$msg = "<span style='color:red;'>Perubahan Gagal.! Username Sudah Di Gunakan</span>";
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
				    	email = '$email', 
				    	user = '$username',
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
			    	email = '$email', 
			    	user = '$username',
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

	public function getStafById($id)
  	{
	  	$query = "SELECT * FROM staf WHERE id='$id'";
	    $result = $this->db->select($query);
	    return $result;
  	}

  	public function delStafById($id)
  	{
  		$query = "DELETE FROM staf WHERE id='$id'";
	    $delete_row = $this->db->delete($query);
	    if ($delete_row) {
	    	$msg = "<span style='color:green'>Data Berhasil di Hapus </span>";
	    	return $msg;
	    }else {
	    	$msg = "<span style='color:red;'>Data Gagal di Hapus </span>";
	    	return $msg;
  		}
  	}

  	public function getJmstaf()
  	{
  		$query = "SELECT COUNT(*) FROM staf";
		$return = $this->db->select($query);
		return $return;
  	}
	}	
?>