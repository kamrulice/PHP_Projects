<?php

include 'Database.php';
include_once'Session.php';



class User{
	private $db;
	public function __construct(){
		$this->db = new database();
	}


	public function UserLogin($data){
		$name = $data['name'];
		$password = md5($data['password']);

		if(strlen($name)<3){
			$msg ="<span style='color:red;'>UserName at least 3 characters long !!</span>";
			return $msg;
		}
		if(strlen($password)<4){
			$msg = "<span style='color:red'>password at least 4 characters long!! </span>";
			return $msg;
		}
		$sql = "SELECT * FROM tbl_log WHERE name = '$name' AND password = '$password' ";
		$query = $this->db->pdo->prepare($sql);
		$result = $query->execute();
		if($result == true){
				echo "successfull";
				$value = mysqli_fetch_array($result);
				$row = mysqli_num_rows($result);
				if($row > 0){
					Session::set("login", true);
					Session::set("username", $value['username']);
					Session::set("UserId", $value['id']);
		return $result;
	}
	
}
}
}
?>

	