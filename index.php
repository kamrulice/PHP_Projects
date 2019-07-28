<?php

include"inc/header.php";
include"lib/Database.php";
include"config.php";
include"lib/Session.php";
Session::init();


?>


<div class="panel panel-body">
	
	<div style="max-width:600px; margin:0 auto;">
		<h2 style="margin:0 auto; font-size:30px; color:blue;">User Login</h2><br>
		<?php
			if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
				$email = $_POST['email'];
				$password =$_POST['password'];

				$db = new database();
				$query = "SELECT * FROM log WHERE email = 'email' AND password='password'";
				$result = $db->Select($query);
				if($result == true){
					echo "success";
				$value = mysqli_fetch_array($result);
				$rows = mysqli_num_rows($result);
				if($rows > 0){
					Session::set("submit",true);
					Session::set("email",value['email']);
					Session::set("userid",value['id']);
					header("location:result.php");
					}
				}
			}


		?>
	 	<form action="" method="post">

			<div class="form-group">
				<label>Email</label>
				<input type="email" name="email" class="form-control">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control">
			</div>
			<button type="submit" name="submit" class="btn btn-primary">Login</button>
		</form>
	</div>
</div>
 
