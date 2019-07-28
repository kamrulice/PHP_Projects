<?php
	
	include"lib/Database.php";
	include"config.php";
	include"lib/Session.php";
	Session::init();
?>
<?php
	$db = new Database();


?>

<!doctype html>
<html>
	<title>User Login</title>
	<header>
		<link href="style.css" rel="stylesheet"/>
	</header>
	<body>
		<h2 style="margin:0auto; font-size:30px; color:white; text-align:center; padding: 34px;">User Login</h2>
		<div class="loginbox">
			<?php
				if($_SERVER['REQUEST_METHOD']=='POST'){
					$name = $_POST['name'];
		$password = md5($_POST['password']);

		if(strlen($name)<3){
			$msg ="<span style='color:red;'>UserName at least 3 characters long !!</span>";
			return $msg;
		}
		if(strlen($password)<4){
			$msg = "<span style='color:red'>password at least 4 characters long!! </span>";
			return $msg;
		}
		$query= "SELECT * FROM tbl_log WHERE name = '$name' AND password = '$password' ";
		$result = $db->Select($query);
		if($result == true){
				echo "successfull";
				$value = mysqli_fetch_array($result);
				$row = mysqli_num_rows($result);
				if($row > 0){
					Session::set("login", true);
					Session::set("username", $value['username']);
					Session::set("UserId", $value['id']);
	
              }else{
              	echo "<span style='color:red; font-size:20px;'>Data not found</span>";
              }
                        }
                        else{
                        	echo "<span style='color:red; font-size:20px;'>UserName and password Not match!!</span>";
                        }
					}

			?>
		
		<form method="post">
			 <p>UserName</p><br>
			 <input type="text" name="name" placeholder="Enter your name"/><br><br>
			 <p>Password</p><br>
			 <input type="password" name="password" placeholder="Enter Password"/><br><br>
			 <button>Login</button>
		</form>
		</div>
	</body>
</html>