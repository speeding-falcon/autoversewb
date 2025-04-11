<?php
    require 'config.php';
    
    $carid = $_POST["hh"];
    echo"Details $carid HAS BEEN PURCHASED";
    
    if(isset($_POST["buyb"])){
              echo "Car Purchased";
              $buyquery = "UPDATE cardata SET avbstatus = 'SOLD' WHERE carid = '$carid'";
              $buyres = mysqli_query($conn,$buyquery);
          }

?>