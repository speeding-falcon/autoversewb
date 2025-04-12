<?php
    require 'config.php';

    $cpnynam = $_POST["searchcpny"];
    //echo "$cpnynam <br>";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="buy.css"> 
    <script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>BuyCar</title>
</head>
<body>
<header class="header">
        <a href="#" class="logo"><ion-icon name="car-sport"></ion-icon>AUTOVERSE</a>
        <?php
        if($cpnynam){
        echo "<h3>Showing $cpnynam Vehicles<h3>";
        }
        else{
            echo "<h3>Showing all Vehicles <h3>";
        }
        ?>
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
    if($cpnynam!=''){
        $query = "SELECT * FROM cardata WHERE company='$cpnynam' or model='$cpnynam' or cartype='$cpnynam'";
        $result = mysqli_query($conn,$query);
        //$row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result)>0){
            //echo  "These cars found from $cpnynam <br>";
            while($row = mysqli_fetch_array($result)){
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
                    <a href='cardetails.php?carid=".$carid."'><img class='i1' src='$targetPath' height='250px'></img></a>
                    <h2>$model</h2>
                    <p>Year: $date</p>
                    <p>Price: $cost</p>
                    <p>Mileage: $odo km</p>
                    <p>Availability: $avbt</p>
                    </div>";


            }
        }
        else{
            echo "<h1>No cars found from $cpnynam <br><h1>";
        }
    }
    else{
        $query = "SELECT * FROM cardata";
        $result = mysqli_query($conn,$query);
        //$row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result)>0){
            echo  "ALl cars <br>";
            while($row = mysqli_fetch_array($result)){
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
                    <a href='cardetails.php?carid=".$carid."'><img class='i1' src='$targetPath'  height='250px'></img></a>
                    <h2>$model</h2>
                    <p>Year: $date</p>
                    <p>Price: $cost</p>
                    <p>Mileage: $odo km</p>
                    <p>Availability: $avbt</p>
                    </div>";


            }
        }
        else{
            echo "No cars found from $cpnynam <br>";
        }
    }
?>

</div>
</body>
</html>


<!--

<div class='card1'>
        <a href=''><img class='i1' src='$targetPath'></img></a>
        <h2>$model</h2>
        <p>Year: $date</p>
        <p>Price: $cost</p>
        <p>Mileage: $odo km</p>
        </div>
-->
        