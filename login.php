<?php
    require 'config.php';
    if(isset($_POST["logsubmit"])){
        $unamemail = $_POST["unamemail"];
        $pword= $_POST["pword"];
        $result = mysqli_query($conn,"SELECT * FROM userstable WHERE username='$unamemail' OR email='$unamemail'");
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result)>0){
            if($pword==$row["password"]){
                $_SESSION["login"] = true;
                $_SESSION["id"] = $row["id"];
                echo "<script>alert('logged in');</script>";
                header("Location: index.php");
            }
            else{
                echo "<script>alert('wrong password');</>";
            }
        }
        else{
            echo "<script>alert('No such user found');</script>";
        }
    }
?>


<html>
<head>
<title>Login</title>
</head>

<body>
<form name="loginform" action="" method="post">
	Username or Email: <input type="text" name="unamemail" required value=""> <br><br>
	Password: <input type="password" name="pword" required value=""> <br><br>
	<input type="submit" value="LOGIN" name="logsubmit" > <br><br>
    <a href="registration.php">Create New Account</a>
	<p id="disp" name="disp">Print messages here</p>
</form>
</body>
</html>