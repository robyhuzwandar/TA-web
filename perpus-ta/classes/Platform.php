<?php 
include_once '../../lib/Database.php';
include_once '../../lib/Format.php';
?>


<?php 
class Platform
{
	private $db;
	private $fm;
	
	function __construct()
	{
		$this->db  = new Database();
		$this->fm  = new Format();
	}

	public function insertPf($namaPf)
	{
		$namaPf = $this->fm->validation($namaPf);
		$namaPf = mysqli_real_escape_string($this->db->link, $namaPf);

		//cek kesamaan nama
		$queryCek = "SELECT * FROM platform WHERE nama='$namaPf'";
		$cekNama = $this->db->select($queryCek);
		if ($cekNama) {
			$msg = "<span style='color:red;'>Gagal Menyimpan.! Bahasa Pemrograman Sudah Tersedia</span>";
			return $msg;
		}else{
			$query = "INSERT INTO platform(nama) VALUE('$namaPf')";
			$insertPf = $this->db->insert($query);
			if ($insertPf) {
				$msg = "<span style='color:green;'>Berhasil di simpan</span>";
				return $msg;
			}else{
				$msg = "<span style='color:red;'>Gagal Menyimpan di simpan</span>";
				return $msg;
			}
		}
			
		}
	
	public function getAllPf()
  	{
	  	$query = "SELECT * FROM platform";
	    $result = $this->db->select($query);
	    return $result;
  	}

  	public function delPfById($id)
  	{
  		$query = "DELETE FROM platform WHERE id='$id'";
	    $delete_row = $this->db->delete($query);
	    if ($delete_row) {
	    	$msg = "Data Berhasil di Hapus";
	    	return $msg;
	    }else {
	    	$msg = "Data Gagal di Hapus";
	    	return $msg;
  		}
	}
	
	public function getPfById($id)
  	{
	  	$query = "SELECT * FROM platform WHERE id='$id'";
	    $result = $this->db->select($query);
	    return $result;
  	}

	}

?>