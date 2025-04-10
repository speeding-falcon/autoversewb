<?php
	require 'config.php';
	if(isset($_POST['regsubmit'])){
	$nam = $_POST['nam'];
	$unam = $_POST['unam'];
	$email = $_POST['email'];
	$phone = $_POST['phn'];
	$pword =$_POST['pword'];
	$cpword = $_POST['cpword'];
	$duplicate = mysqli_query($conn, "SELECT * from userstable where username = '$unam' OR email = '$email'" );

	if(mysqli_num_rows($duplicate)>0){
		echo "<script>alert('duplicate email or username');</script>";
	}
	else{
		if($pword==$cpword){
			try{
			$query = "INSERT INTO userstable VALUES ('','$nam','$unam','$pword','$email','$phone')";
			mysqli_query($conn,$query);
			echo "<script>alert('Registered successfully');</script>";
			echo "SUCCESS";
			header("Location: login.php");
			}
			catch(Exception){
				echo "<script>alert('some db/php error');</script>";
			}
		}
		else{
			echo "<script>alert('passwords dont match');</script>";
		}
	}

	}
	
?>


<html>
<head>
<title>registration</title>
</head>
<body>
<form name="regform" action="registration.php" method="post">
	<div>
	Name: <input type="text" name="nam" id="nam" placeholder="name">
	Username: <input type="text" name="unam" id="unam" placeholder="username">
	</div>
	<br><br>
	<div>
	Email: <input type="text" name="email" id="email" placeholder="email">
	Phone: <input type="number" name="phn" id="phn" placeholder="phone number">
	</div>
	<br><br>
	<div>
	Password:<input type="password" name="pword" id="pword" placeholder="Password" required>
	Confirm Password:<input type="password" name="cpword" id="cpword" placeholder="Confirm Password" required>
	</div>
	<br><br>
	<input type="submit" name="regsubmit" value="register">
<br><br>
	
</form>
<p id="rdisp" name="rdisp">display results here</p>
<a href="login.php">already registered? login</a>
</body>
</html>