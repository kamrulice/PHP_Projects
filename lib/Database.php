<?php

class database{
	 
	 private $dbhost = DB_HOST;
	 private $dbname = DB_NAME;
	 private $dbuser = DB_USER;
	 private $dbpass = DB_PASS;
	 public $link ;
	 public $error;

	 public function __construct(){
	 		$this->connectdb();
	 }
	 private function connectdb(){
	 	$this->link = new mysqli($this->dbhost, $this->dbuser,$this->dbpass, $this->dbname);
	 	if(!$this->link){
	 		$this->error = "connection fail".$this->link->connect_error;
	 		return false;
	 	}

	 }
	 public function Select($query){
	 	$result = $this->link->query($query) or die($this->link->connect.__LINE__);
	 	if($result->num_rows > 0){
	 		return $result;
	 	}else{
	 		return false;
	 	}
	 }
	 public function Insert($query){
	 	$result = $this->link->query($query) ; 
	 }
}


?>