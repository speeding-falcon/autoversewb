<?php
    require 'config.php';
    
    $carid = $_GET["carid"];
    echo"Details $carid";
    
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if($_SESSION["login"] == true){
    
    
        $idd = $_SESSION["id"];
        $uresult = mysqli_query($conn,"SELECT * FROM userstable WHERE id='$idd'");
        $urow = mysqli_fetch_assoc($uresult);
        echo "LOgged in as $idd <br>";
        if(mysqli_num_rows($uresult)>0){
            echo "Account: {$urow['username']}<br>";
        }
        }
        else{
    
            sleep(2);
            header("Location: login.php");
        }
   
        try{
            $carid = $_GET["carid"];
            echo"Details $carid";
            $query = "SELECT * FROM cardata WHERE carid='$carid'";
        $result = mysqli_query($conn,$query);

        

        //$row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result)>0){
            echo  "These cars found from $carid <br>";
            while($row = mysqli_fetch_array($result)){
                $avbt = $row["avbstatus"];
                $userid = $_SESSION["id"];
                $sellerid = $row["sellerid"];
                $vtype = $row["cartype"];
                $cpn = $row["company"];
                $gear = $row["gear"];
                $fuel = $row["fuel"];
                $ow = $row["ownership"];
                $model = $row["model"];
                $targetPath = $row["filename"];
                $cost = $row["price"];
                $odo = $row["odo"];
                $date = $row["mdate"];
                $carid = $row["carid"];

                $sellres = mysqli_query($conn,"SELECT * FROM userstable WHERE id='$sellerid'");
                $sellrow = mysqli_fetch_assoc($sellres);
                if(mysqli_num_rows($sellres)>0){
                    $sellername = $sellrow["name"];
                    $sellerphone = $sellrow["phone"];
                    $selleremail = $sellrow["email"];
                }
                
                // echo "Model = $model <br>";
                // echo "<img src='$targetPath' width='300px' height='200px'><br><br>";
                echo "
                <div class='card1'>
                    <img class='im1' src='$targetPath' height='400px' width='650px'></img>
                    <h2>$cpn</h2>
                    <h2>$model</h2>
                    <p>Vehicle Type: $vtype</p>
                    <p>Manufacture Date: $date</p>
                    <p>Price: $cost Rs</p>
                    <p>Seller: $sellername</p>
                    <p>Seller Phone: $sellerphone</p>
                    <p>Seller Email: $selleremail</p>
                    <p>Availability: $avbt</p>
                    <p>Past owners: $ow</p>
                    <p>Transmission(Gear): $gear</p>
                    <p>Fuel: $fuel</p>
                    <p>Mileage: $odo km</p>
                    <p>Fuel: $fuel</p>
                    <p>Car UID: $carid</p>
                    </div>";
                    if($avbt=="available"){
                    echo"
                    <form action='buypage.php' name='buycar' method='post'>
                        <input type='hidden' value={$carid} name='hh'>
                        <input type='submit' value='BUY VEHICLE' name='buyb' method='post'>
                    </form>";
                    }
                    else{
                        echo"
                    <form action='buypage.php' name='buycar' method='post'>
                        <input type='hidden' value={$carid} name='hh'>
                        <input type='submit' value='BUY VEHICLE' name='buyb' method='post' disabled>
                    </form>";
                    }
            }
            }
        }
            catch(Exception){
                echo "Car not selected";
            }
        
    ?>
    <?php
        //  if(isset($_POST["buyb"])){
        //      echo "Car Purchased";
        //      $buyquery = "UPDATE cardata SET availability = 'SOLD' WHERE carid = $carid";
        //      $buyres = mysqli_query($conn,$buyquery);
        //  }
    ?>
    <div>
        <?php
        
        // echo"
        // <form action='buypage.php' name='buycar' method='post'>
        //     <input type='hidden' value={$carid} name='hh'>
        //     <input type='submit' value='BUY VEHICLE' name='buyb' method='post'>
        // </form>"
        ?>
    </div>
</body>
</html>
