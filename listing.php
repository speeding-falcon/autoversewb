<?php
    require 'config.php';

    $cpnynam = $_POST["searchcpny"];
    echo "$cpnynam <br>";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listing</title>
    <link rel="stylesheet" type="text/css" href="buy.css">
</head>
<body>

<div class="wrap">

<?php
    if($cpnynam!=''){
        $query = "SELECT * FROM cardata WHERE company='$cpnynam'";
        $result = mysqli_query($conn,$query);
        //$row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result)>0){
            echo  "These cars found from $cpnynam <br>";
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
                    <a href='cardetails.php?carid=".$carid."'><img class='i1' src='$targetPath'></img></a>
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
        