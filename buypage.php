<?php
    require 'config.php';
    
    $carid = $_POST["hh"];
    echo"Details $carid HAS BEEN PURCHASED";
    $idd = $_SESSION["id"];
    $result = mysqli_query($conn,"SELECT * FROM userstable WHERE id='$idd'");
    $row = mysqli_fetch_assoc($result);
    $uid = $row['id'];
    if(isset($_POST["buyb"])){
              echo "<br> Car Purchased";
              $buyquery = "UPDATE cardata SET avbstatus = 'SOLD' WHERE carid = '$carid'";
              $buyres = mysqli_query($conn,$buyquery);
              
              $cartadd = "INSERT into cart values ('','$uid','$carid')";
              $cara = mysqli_query($conn,$cartadd);
              echo "<br> Car added to cart ";
              sleep(2);
              header("Location: cart.php");
          }

?>