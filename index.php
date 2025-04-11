<?php
    require 'config.php';

    if($_SESSION["login"] == true){
    
    
    $idd = $_SESSION["id"];
    $result = mysqli_query($conn,"SELECT * FROM userstable WHERE id='$idd'");
    $row = mysqli_fetch_assoc($result);
    echo "LOgged in as $idd <br>";
    if(mysqli_num_rows($result)>0){
        echo "Account: {$row['username']}<br>";
    }
    }
    else{

        sleep(2);
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
</head>
<body>
    <form action="listing.php" name="cpnysubform" id="cpnysubform" method="post">
        <input type="text" name="searchcpny" id="searchcpny" placeholder="search by company">
        <input type="submit" name="cpnysubmit" id="cpnysubmit">
    </form>
        
    </form>
    <a href="login.php">Login</a><br>
    <a href="logout.php">Logout</a><br>
    <a href="createcar.php">Sell Your car</a><br>
</body>
</html>