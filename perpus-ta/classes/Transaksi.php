<?php 
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../lib/Format.php');

spl_autoload_register(function($class){
  include_once "classes/".$class.".php";
});
  $b = new Buku();
  $m = new Member();
?>

<?php 
class Transaksi
{
	private $db;
	public function __construct()
	{
		$this->db = new Database();
	}

	public function addToTemp($kodeBuku)
	{
		$kodeBuku = mysqli_real_escape_string($this->db->link, $kodeBuku);
	
		$query = "SELECT * FROM cart WHERE kodeBuku ='$kodeBuku'";
		$result = $this->db->select($query);
		if ($result) {
			$msg = "<span style='color:red'>Buku Sudah Masuk ke Cart</span>";
			return $msg;
		}else{
			$query = "INSERT INTO cart(kodeBuku) VALUES('$kodeBuku')";
			$insert_row = $this->db->insert($query);
			if ($insert_row) {
				$msg = "<span style='color:green'>Buku Sukses Masuk ke Cart </span>";
				return $msg;
			}else{
				$msg = "<span style='color:red'>Buku Gagal Masuk ke Cart</span>";
				return $msg;
			}
		}
	}

	public function getCart()
	{
		$query = "SELECT * FROM cart";
		$result = $this->db->select($query);
		return $result;
	}

	public function addToPinjam($nim, $staf)
	{
		$query = "SELECT * FROM cart";
		$getValue = $this->db->select($query);
		if ($getValue) {
			while ($result = $getValue->fetch_assoc()) {
				$kodeBuku = $result['kodeBuku'];
				$nim = mysqli_real_escape_string($this->db->link, $nim);
				$staf = mysqli_real_escape_string($this->db->link, $staf);
				$tgl1 = date('Y-m-d');
				$tgl_kembali = date('Y-m-d', strtotime('+7 days', strtotime($tgl1)));
				
				$kodepinjam = substr($nim, 7);
				$kodepinjam .= substr($tgl1, 4);

				$query = "SELECT * FROM pinjam WHERE kodeBuku ='$kodeBuku'";
				$result = $this->db->select($query);
				if ($result) {
					$msg = "Buku Sudah di Daftar Pinjam";
				}else{
					$query = "INSERT INTO pinjam(kodePinjam, tglpinjam, member_nim, admin_id, tglKembali) VALUES('$kodePinjam','$tgl1', '$nim', '$staf', '$tgl_kembali')";
					$insert_row = $this->db->insert($query);
					if ($insert_row) {
					$msg = "<span style='green'>Buku Sukses Masuk ke daftar pinjam </span>";
					return $msg;
					}else{
						$msg = "<span style='red'>Buku Gagal Masuk ke daftar pinjam</span>";
						return $msg;
					}
				}
			}
		}
	}

	public function getAllMember()
	{
		$query = "SELECT * FROM pinjam";
		$result = $this->db->select($query);
		return $result;
	}

	public function getPinjam()
	{
		$query = "SELECT * FROM pinjam";
		$result = $this->db->select($query);
		return $result;
	}
}

?>