<?php  

class Format
{
	public function textShorter($text, $limit= 400)
	{
		$text = $text." ";
		$text = substr($text,0, $limit); // mengambil sebagian 
		$text = $text.".....";
		return $text;
	}

	public function validation($data){
      $data = trim($data); //menghapus whitespace di awal dan akhir
      $data = stripcslashes($data); //Hapus garis miring terbalik
      $data = htmlspecialchars($data); //Mengkonversi karakter 
      return $data;
    }

    public function title(){
      $path = $_SERVER['script_FILENAME']; 
      $title = basename($path, '.php');
      if($title == 'index'){
        $title = 'home';
      }else if($title = 'contact'){
        $title = 'contact'; 
      }
      return $title = ucfirst($title);
    }
}
?>