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
		<script src="js/bootstrap.js"></script>
	  	<script src="js/jquery-3.3.1.min.js"></script>

 
 <style>
 body{
 	background-image: url(img/a2.jpg);
 	background-size: cover;
 	margin :0;
 }

 </style>


	</head>
<body>
	<br><br>
				<div class = "col-md-4"></div>
					<div class = "col-md-4">
						<div class = "panel panel-default">
							<div class = "panel-body">	
									<form method = "post" action = "registration.php">

										<div class = "form-group">
												<label>First Name</label> 
												<input type ="text" name="UI-firstname" class="form-control" required="yes" placeholder="John">
										</div>

										<div class = "form-group">
												<label>Last Name</label> 
												<input type ="text" name="UI-lasname" class="form-control"  required="yes"
												placeholder="Smith">
										</div>

										<div class = "form-group">						
												<label>Email Address</label>
										 		<input type ="email" name="UI-email" class="form-control" required="yes" placeholder="johnsmith@gmail.com">
										 </div>
										<div class = "form-group">
												<label>Phone Number</label>
											 	<input type ="text" name="UI-phone" class="form-control" required="yes" placeholder="09120239029">
										</div>	
										<div class = "form-group">
												<label>Address</label>
											 	<input type ="text" name="address" class="form-control" required="yes" placeholder="09120239029">
										</div>

										<div class = "form-group">
												<label>Username:</label>
												<input type ="text" name="UI-username" class="form-control" required="yes" placeholder="johny">
										</div>

										<div class = "form-group">
												<label>Password:</label>
												<input type ="password" name="UI-password" class="form-control" required="yes">
										</div>

										<div class = "form-group">
												<label>Confirm Password</label> 
												<input type ="password" name="UI-confirm" class="form-control" required="yes">
										</div>
											<a href = "login.php"> Back to login </a>
											<input type ="submit" value="Register" class="btn btn-primary" name="sub" style="margin-left: 53%;">
								</form>	


						<br>
<?php
	
$con=mysqli_connect("localhost","root","","laoagrestau") or die(mysqli_error());

if(isset($_POST["sub"])){
if(!empty($_POST['UI-username']) && !empty($_POST['UI-password'])) {

	$firstname = mysqli_real_escape_string($con,$_POST['UI-firstname']);
	$lastname = mysqli_real_escape_string($con,$_POST['UI-lasname']);
	$email = mysqli_real_escape_string($con,$_POST['UI-email']);
	$phone = mysqli_real_escape_string($con,$_POST['UI-phone']);
	$address = mysqli_real_escape_string($con,$_POST['address']);
	$username = mysqli_real_escape_string($con,$_POST['UI-username']);
	$password =mysqli_real_escape_string($con, $_POST['UI-password']);
	$confirm =mysqli_real_escape_string($con, $_POST['UI-confirm']);

			$compare="SELECT * FROM members WHERE username='".$username."'";
			$query=mysqli_query($con,$compare);

			$numrows=mysqli_num_rows($query);

			//Condition for the password confirmation//
	if($password == $confirm)
		{							
							if($numrows==0)

									{
									$sql="INSERT INTO members(first_name,last_name,email,phone,address,username,password) VALUES('$firstname','$lastname','$email','$phone','$address','$username','$password')";
														
										$chech2=mysqli_query($con,$sql);
										$result=mysqli_query($con,$chech2);

									if($chech2){
									echo "<div class='alert alert-info' role='alert'>Account Successfully Created</div>";
									} 
										else 
											{
											echo "Failure!";
											}

									} 



										else {
											echo "<div class='alert alert-danger' role='alert'>That username already exists! Please try again with another.</div>";
							 
							 				}

							}
		//Condition for the password confirmation//
	else{
			echo "<div class='alert alert-danger' role='alert'><strong>Warning!</strong><br>Confirm Password Does not Match</div>";

		}


}

 else {
	echo "All fields are required!";
}



}
?>
							</div>
						</div>
					</div>
				<div class = "col-md-4"></div>
			
		</body>

			
</html>