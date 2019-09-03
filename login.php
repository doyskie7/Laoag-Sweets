<?php 
	session_start(); 
?>

<?php

	include("config.php");

	if(isset($_SESSION['sess_user'])) {
			
		header("location: index");

	}else if (isset($_SESSION['sess_admin'])){
		
		header("location: admin");
	}
	
?>
<!DOCTYPE html>
<html>	
	<head>
		
		<title>Laoag Restua</title>

		 <link rel="stylesheet" href="css/bootstrap.min.css"> 
		 <script src="js/bootstrap.min.js"></script>
 <style>
 body{
 	background-image: url(img/a2.jpg);
 	background-size: cover;
 	margin :0;
 }
 	input{
 		width: 70%;
 		outline: none;
 		padding: 10px 4px;
 		border: 1px #aaa solid;
 		font-size: 15px;
 		background: #fff;
 		display: block;
 		margin: 20px auto;
 	}
 	#login{
 		background: #19b1ca;
 		color: #fff;
 		border:none;
 	}
 	#hehe{
 		width:30%;
 		height: 400px;
 		background: rgba(0,0,0,.2);
 		box-shadow: 5px 4px 43px #000;
 		position : absolute;
 		top:90px;
 		left: 480px;
 	}
 	form{
 		margin-top: 30px auto;
 		
 	}
 	b{
 		font-size:25px;
 		color: #fff;

 	}
 	a{
 		color: #fff;
 	}
 	img{
 		display: block;
 		margin:-75px auto 0 auto;
 		height: 150px;
 		width: 150px;
 	}
 </style>
	</head>
<body>
	<center>	
				<div id = "hehe">
				<form method="post" action = "login.php">
				<img src="img/avatarlogin.png">
				<center><b>Login</b>
						<input type ="text" name="insert_username" placeholder="Email" id="" required="yes" />
					
						<input type ="password" name="insert_password"  placeholder="Password" id="" required="yes" />
						
						<input type ="submit" value="GO"  name="submit" id="login"/> 
						<a href="index"> Home</a> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; 
						<a href="registration.php"> Register an account</a>
				</center>		 
				</form>	
				</div>
	</center>	
			<?php
	@$btnsignin = $_POST['submit'];
	if($btnsignin=="GO") {
		include "config.php";

		$uname = $_POST['insert_username'];	
		$pass = $_POST['insert_password'];	

		$username = strip_tags(mysqli_real_escape_string($con,trim($uname)));
		$password = strip_tags(mysqli_real_escape_string($con,trim($pass)));		 	
			
			$checkuser = "SELECT * FROM members WHERE username='".$username."'";
			$checkuserquery = mysqli_query($con, $checkuser);


			$checkadmin = "SELECT * FROM admin WHERE username='".$username."'";
			$checkadminquery = mysqli_query($con, $checkadmin);


			 if (mysqli_num_rows($checkuserquery) != 0 || mysqli_num_rows($checkadminquery) != 0)
				{
					$row = mysqli_fetch_array($checkuserquery);
					$hashpass =$row['password'];


					$roow = mysqli_fetch_array($checkadminquery);
					$adpass =$roow['password'];
						

						if ($hashpass == $password)
							{
								$_SESSION['sess_user'] = $username;
								header("Location: index");
							}
						else if($adpass == $password)
							{
								$_SESSION['sess_admin'] = $username;
								header("location: admin.php");
							}
						
						else
							{
							echo "</br>";
							echo "</br>";
							echo "<script>alert('Wrong Password')</script>";
							}			
				}	
			else 
				{
					echo "</br>";
					echo "</br>";
					echo "<script>alert('No username found in the database, please check the username')</script>";
				}	
			

				}	
?>		
			
					
		</body>
</html>