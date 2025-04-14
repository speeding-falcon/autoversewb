<?php
    require 'config.php';

    if($_SESSION["login"] == true){
    
    
    $idd = $_SESSION["id"];
    $result = mysqli_query($conn,"SELECT * FROM userstable WHERE id='$idd'");
    $row = mysqli_fetch_assoc($result);
    //echo "LOgged in as $idd <br>";
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autoverse - Home</title>
    <link rel="stylesheet" href="omepagestyle.css">
    <script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons.js"></script>
</head>
<body>
<header>
        <nav>
            <div class="logo"><ion-icon name="car-sport"></ion-icon> Autoverse <?php
            if(mysqli_num_rows($result)>0){
        echo "Account: {$row['username']}<br>";
    }
    }
    else{

        sleep(2);
        header("Location: login.php");
    } ?>
    </div>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="cart.php">View Cart</a></li>
                
                
                <li><a href="login.php">Switch Account</a></li>
                <li><a href="registration.php">Create Account</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
            
        </nav>
    </header>
    <section class="hero">
        <div class="overlay"></div>
        <div class="content">
            <h1>Better Drives, Better Lives</h1>
            <p>Unlock the ultimate driving experience with Autoverse. Buy, sell, and explore cars effortlessly.</p>
            <a href="registration.php" class="btn">Get Started</a>
        </div>
    </section>
    <div class="search-section">
        <div class="search-container">
            <div class="categories">
                <div class="category active">
                    <a href="#">
                    <ion-icon name="car-sport"></ion-icon></a>
                    <span>Buy used car</span>
                    
                </div>
                <div class="category">
                    <a href="createcar.php">
                    <ion-icon name="cash"></ion-icon>
                    </a>
                    <span>Sell car</span>
                    
                </div>
                <div class="category">
                    <a href="listing.php"><ion-icon name="car"></ion-icon></a>
                    <span>New cars</span>
                </div>
                <div class="category">
                    <ion-icon name="card"></ion-icon>
                    <span>Car loan</span>
                </div>
                <div class="category">
                    <ion-icon name="wallet"></ion-icon>
                    <span>Credit card</span>
                </div>
                <div class="category">
                    <ion-icon name="briefcase"></ion-icon>
                    <span>Personal loan</span>
                </div>
                <div class="category">
                    <ion-icon name="trash"></ion-icon>
                    <span>Scrap car</span>
                </div>
                <div class="category">
                    <ion-icon name="grid"></ion-icon>
                    <span>More</span>
                </div>
            </div>
            
            <form action="listing.php" name="cpnysubform" id="cpnysubform" method="post">
            <div class="search-bar">
                
                <ion-icon name="search"></ion-icon>
                <!-- <input type="text" placeholder="Search for your favourite cars"> -->
                <input type="text" name="searchcpny" id="searchcpny" placeholder="search by company/model/type of car">
                <!-- <input type="submit" name="cpnysubmit" id="cpnysubmit"> -->
                
            </div>
            <!-- <button class="view-btn">View all cars</button> -->
            <input type="submit" name="cpnysubmit" id="cpnysubmit" class="view-btn" value="Search">
            </form>
        </div>
    </div>

    <!-- <form action="listing.php" name="cpnysubform" id="cpnysubform" method="post">
        <input type="text" name="searchcpny" id="searchcpny" placeholder="search by company">
        <input type="submit" name="cpnysubmit" id="cpnysubmit">
    </form> -->
        
    
    
</body>
</html>