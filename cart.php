<?php
    require 'config.php';
    $idd = $_SESSION["id"];
    $result = mysqli_query($conn,"SELECT * FROM userstable WHERE id='$idd'");
    $urow = mysqli_fetch_assoc($result);
    $uid = $urow['id'];
    $unam = $urow['name'];
    $cartquery = "SELECT * FROM cart WHERE userid='$uid'";
        $cartresult = mysqli_query($conn,$cartquery);
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cartbu.css"> 
    <script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>CART-AUTOVERSE</title>
</head>
<body id="cartbody">
<header class="header">
        <a href="#" class="logo"><ion-icon name="car-sport"></ion-icon>AUTOVERSE</a>
        <?php echo  "<h3>These cars ARE IN YOUR CART: $unam </h3>"; ?>
    <nav class="nav">
        <a href="index.php">Home</a>
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Reviews</a>
        <a href="#">Contact</a>
    </nav>
</header>

<div class="wrap">
    <?php
        if(mysqli_num_rows($result)>0){
            //echo  "These cars ARE IN YOUR CART: $unam <br>";
                while($ctrow = mysqli_fetch_array($cartresult)){
                    $carid = $ctrow["carid"];
                    $carq = "SELECT * FROM cardata WHERE carid= '$carid'";
                    $cresult = mysqli_query($conn,$carq);
                    $row = mysqli_fetch_assoc($cresult);
    
                    $model = $row["model"];
                    $targetPath = $row["filename"];
                    $cost = $row["price"];
                    $odo = $row["odo"];
                    $date = $row["mdate"];
                    $carid = $row["carid"];
                    $avbt = $row["avbstatus"];
                    // echo "Model = $model <br>";
                    // echo "<img src='$targetPath' width='300px' height='200px'><br><br>";
                    echo "
                    <div class='card1'>
                        <a href='cardetails.php?carid=".$carid."'><img class='i1' src='$targetPath'></img></a>
                        <h2>$model</h2>
                        <p>Year: $date</p>
                        <p>Price: $cost</p>
                        <p>Mileage: $odo km</p>
                        <p>Availability: $avbt</p>
                        </div>";
    
    
    
                }
        }
    ?>

</div>
</body>
</html>
