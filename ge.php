<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="GET" action="">
	<input type="number" name="qu" value="0">
	<input type="number" name="ASD" value="0">
	<input type="radio" name="c" value = "sss">
	<input type="submit" name="submit">
	</form>
	<?php 
	if(isset($_GET['submit']))
	{
		echo $_GET['c'];
	}
					$quq = $_GET['ASD'];
					echo $quq;


					$quqq = $_GET['qu'];
					echo $quqq;
	?>

</body>
</html>