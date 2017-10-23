<?php 

class Beranda
{
	
	private $db;
	private $fm;
	
	public  function __construct(){
		$this->db = new Database();
		$this->fm = new format();
	}

	public function JmBpemrP()
	{
		$sql = "SELECT * FROM pemrograman WHERE nama = 'PHP'";
		$result =  $this->db->select($sql);
		if ($result) {
			while ($cek = $result->fetch_assoc()) {
				$id = $cek['id'];
				$query = "SELECT COUNT(*) FROM buku WHERE pemrograman_id = '$id'";
				$Jres = $this->db->select($query);		
				return $Jres;
			}
		}
	}

	public function JmBpemrJ()
	{
		$sql = "SELECT * FROM pemrograman WHERE nama = 'JAVA'";
		$result =  $this->db->select($sql);
		if ($result) {
			while ($cek = $result->fetch_assoc()) {
				$id = $cek['id'];
				$query = "SELECT COUNT(*) FROM buku WHERE pemrograman_id = '$id'";
				$Jres = $this->db->select($query);		
				return $Jres;
			}
		}
		
	}
}

?>