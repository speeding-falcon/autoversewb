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
                echo "<script>alert('wrong password');</script>";
            }
        }
        else{
            echo "<script>alert('No such user found');</script>";
        }
    }
?>


<html>
<head>
        <title>
            AUTOVERSE-LOGIN
        </title>
        <link rel="stylesheet" href="loginstyle1.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    </head>


<body>
<header class="header">
            <a href="#" class="logo"><ion-icon name="car-sport" ></ion-icon> AUTOVERSE</a>

        <nav class="nav">
            <a href="index.php">Home</a>
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Reviews</a>
            <a href="#">Contact</a>
        </nav>
    </header> 
    <section class="home">
        <div class="content">
            <h2>AUTOVERSE</h2>
            <p> Unlock the ultimate driving experience-log in to explore,compare,and find your perfect ride.Your next car adventure starts here!</p>
            <a href="registration.php">Create Account</a>
        </div>
        <div class="wrapper-login">
            <h2 class="member">Sign-in</h2>
            <form name="loginform" action="" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="text" name="unamemail" required value="" placeholder="Email/Username">
                     
                </div>

                <div class="input-box">
                    
                    <input type="password" name="pword" required value="" placeholder="Password">
                    
			<span class="icon"><ion-icon name="lock-closed"></ion-icon></span>   
                </div>
               
                <input type="submit" value="LOGIN" name="logsubmit" class="btn">
                

            </form>

        </div>

    </section>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<!-- <form name="loginform" action="" method="post">
	Username or Email: <input type="text" name="unamemail" required value=""> <br><br>
	Password: <input type="password" name="pword" required value=""> <br><br>
	<input type="submit" value="LOGIN" name="logsubmit" > <br><br>
    <a href="registration.php">Create New Account</a>
	<p id="disp" name="disp">Print messages here</p>
</form> -->
</body>
</html>