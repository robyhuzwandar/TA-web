<?php 
include_once '../../lib/Database.php';
include_once '../../lib/Format.php';
?>

<?php 
class Pemrograman
{
	private $db;
	private $fm;
	
	function __construct()
	{
		$this->db  = new Database();
		$this->fm  = new Format();
	}

	public function insertPemr($namaPemr)
	{
		$namaPemr = $this->fm->validation($namaPemr);
		$namaPemr = mysqli_real_escape_string($this->db->link, $namaPemr);

		//cek kesamaan nama
		$queryCek = "SELECT * FROM pemrograman WHERE nama='$namaPemr'";
		$cekNama = $this->db->select($queryCek);
		if ($cekNama) {
			$msg = "<span style='color:red;'>Gagal Menyimpan.! Bahasa Pemrograman Sudah Tersedia</span>";
			return $msg;
		}else{
			$query = "INSERT INTO pemrograman(nama) VALUE('$namaPemr')";
			$insertPemr = $this->db->insert($query);
			if ($insertPemr) {
				$msg = "<span style='color:green;'>Berhasil di simpan</span>";
				return $msg;
			}else{
				$msg = "<span style='color:red;'>Berhasil di simpan</span>";
				return $msg;
			}
		}
			
		}
	
	public function getAllPemr()
  	{
	  	$query = "SELECT * FROM pemrograman ORDER BY id DESC";
	    $result = $this->db->select($query);
	    return $result;
  	}
	
	public function pemrUpdate($namaPemr, $id)
	{
		$namaPemr = mysqli_real_escape_string($this->db->link, $namaPemr);
		$id = mysqli_real_escape_string($this->db->link, $id);

		$query = "UPDATE pemrograman SET nama = '$namaPemr' WHERE pId='$id'";
		$update_row = $this->db->update($query);
		if ($update_row) {
			$msg = "<span style='color:green;'>Pemrograman Berhasil di Update</span>";
	          return $msg;
		}else{
			$msg = "<span style='color:red;'>Pemrograman gagal di Update!</span>";
	          return $msg;
		}
	}

	public function getPemrById($id)
  	{
	  	$query = "SELECT * FROM pemrograman WHERE id='$id'";
	    $result = $this->db->select($query);
	    return $result;
  	}

  	public function delPemrById($id)
  	{
  		$query = "DELETE FROM pemrograman WHERE id='$id'";
	    $delete_row = $this->db->delete($query);
	    if ($delete_row) {
	    	$msg = "Data Berhasil di Hapus";
	    	return $msg;
	    }else {
	    	$msg = "Data Gagal di Hapus";
	    	return $msg;
  		}
	}
}

?>