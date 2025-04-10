<?php
    require 'config.php';
    if($_SESSION["login"]){
    
    

    if(isset($_POST["carsubmit"])){
        $avbt = "available";
        $sellerid = $_SESSION["id"];
        $vtype = $_POST["vtype"];
        $cpn = $_POST["cpny"];
        $model = $_POST["mdln"];
        $mdate = date('Y-m-d',strtotime($_POST["mfd"]));
        $odo = $_POST["odo"];
        $gear = $_POST["trans"];
        $fuel = $_POST["fuel"];
        $ow = $_POST["owne"];
        $regno = $_POST["regno"];
        $feat = $_POST["feat"];

        // echo "vtype = $vtype";
        // echo "sellerid = $sellerid";
        // echo "mfd = $mdate";
        
        $filename = $_FILES["photo"]["name"];
        // $ext = pathinfo($filename,PATHINFO_EXTENSION);
        // $allowedTypes = array("jpg","jpeg","png","gif");
        $tempName = $_FILES["photo"]["tmp_name"];
        $targetPath = "uploads/".$filename;

        echo "filename = $filename <br>";
        echo "tempname = $tempName <br>";

        if($filename){
            if(move_uploaded_file($tempName,$targetPath)){
                echo "<img src='$targetPath' width='300' height='200'>";
                try{
                    $query = "INSERT into cardata values ('$avbt','','$sellerid','$vtype','$cpn','$model','$mdate','$odo','$gear','$fuel','$ow','$regno','$feat','$targetPath')";
                    mysqli_query($conn,$query);

                    echo "<script>alert('created a post');</script>";
			        echo "SUCCESS";
                    sleep(2);
			        header("Location: index.php");
                }
                catch(Exception){
                    echo "<script>alert('some db error');</script>";
                }
                

            }
        }
    }

    }
    else{
        header("Location: login.php");
    }
?>

<html>
<head>
<title>Sell Car</title>
</head>
<body>
<p>signed in as: </p>
<form name="crform" id="crform" action="createcar.php" method="post" enctype="multipart/form-data" required>
    Vehicle Type:  <select name="vtype" ><option value="SUV">SUV</option><option value="sedan">Sedan</option><option value="hatchback">Hatchback</option><option value="bike">Bike</option></select><br><br>
	Company: <input type="text" id="company" name="cpny" required><br><br>
	Model Name: <input type="text" id="mdln" name="mdln" required><br><br>
	Manufacture date: <input type="date" id="mfd" name="mfd" required><br><br>
	Odometer(distance in km): <input type="number" name="odo" id="odo" required><br><br>
	Transmission: <select name="trans" ><option value="Manual">Manual</option><option value="Automatic">Automatic</option></select><br><br>
	Fuel:  <select name="fuel" ><option value="Petrol">Petrol</option><option value="Diesel">Diesel</option><option value="Electric">Electric</option><option value="Hybrid">Hybrid</option></select><br><br>
	Ownership: <input type="number" name="owne" id="owne" required><br><br>
	Registration Number: <input type="text" name="regno" id="regno" required><br><br>
	Features: <input type="text" name="feat" id="feat" required><br><br>
	Photo: <input type="file" name="photo" accept=".jpg, .jpeg, .png" required><br><br>
	<input type="submit" value="add car" name="carsubmit">
</form>
</body>
</html>