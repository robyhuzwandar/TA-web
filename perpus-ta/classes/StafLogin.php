<?php  
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Session.php');
	Session::checkLogin();

	include_once '../lib/Database.php';
	include_once '../lib/Format.php';
?>
<?php 
class StafLogin
{
	private $db;
	private $fm;



	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}


	public function staflogin($stafUser, $stafPass)
	{
		$stafUser = $this->fm->validation($stafUser);
		$stafPass = $this->fm->validation($stafPass);

		$stafUser = mysqli_real_escape_string($this->db->link, $stafUser);
		$stafPass = mysqli_real_escape_string($this->db->link, $stafPass);

		$query = "SELECT * FROM staf WHERE user='$stafUser' AND pass='$stafPass'";
		$result = $this->db->select($query);
		if ($result != false) {
			$value = $result->fetch_assoc();
			Session::set("staflogin", true);
			Session::set("id", $value['id']);
			Session::set("stafUser", $value['user']);
			Session::set("nama", $value['nama']);
			Session::set("foto", $value['foto']);
			Session::set("level", $value['level']);
			header ("location: index.php");
		}else{
			$msg = "<span style='color:red;'>Username dan Password Salah</span>";
			return $msg;
		}

	}
}
?>