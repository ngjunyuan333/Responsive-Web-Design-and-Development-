<?php
include ('phpConn.php');

session_start();

if (!isset($_SESSION['customer_id'])) {
    echo "<script>
            alert('You must be logged in.');
            window.location.href = 'Login.html';
        </script>"; 
}


$id = $_SESSION['customer_id'];

$query = "SELECT * FROM coupon WHERE Customer_ID = '$id'";

$result = mysqli_query($dbConn,$query);

 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="Logo2.css" rel="stylesheet" type="text/css">
    <link href="Coupons.css" rel="stylesheet">
</head>
<style>
body {
   
    height: 100vh;
    margin: 0;
}

.multilevel-dropdown-menu{
    z-index: 1;
    
}
.footer{
    position: relative;
    width: auto;
    bottom: 0;

}

.responsive-image {
    max-width: 100%; max-height: 100%; width: auto; height: auto;                 
    display: block;                
}

</style>
<body>
    <ul class="multilevel-dropdown-menu">
        <a href="index.php"><img src="imresizer-1727321361667.png" class="logo" onclick="index.php"></a>
        <a href="Login.html"><img src="pngwing.com.png" class="logo2" onclick="Login.html"></a>
        <li class="parent"><a href="#">Account Management</a>
            <ul class="child">
                    <li><a href="Login.html">Login</a></li>
                    <li><a href="Register_page.php">Register</a></li>
                    <li><a href="Edit_Account_info.php">Edit Account Information</a></li>
                    <li><a href="wishlisted.php"> Wishlisted</a></li>
                    <li><a href="claimedcoupon.php">View Claimed Coupons</a></li>
                    <li class="parent"><a href="ptl.php">View Purchases</a></li>
                </ul>
            </li>
            <li class="parent"><a href="#">Travel Packges</a>
                <ul class="child">
                    <li class="parent"><a href="#">Overseas Packages<span class="expand">»</span></a>
                       <ul class="child">
                          <li><a href="TPLpage.php?region=Europe">Europe</a></li>
                          <li><a href="TPLpage.php?region=America">America</a></li>
                          <li><a href="TPLpage.php?region=East_Asia">East Asia</a></li>
                        </ul>
                        </li>
                           <li class="parent"><a href="#">Malaysia Packages<span class="expand">»</span></a>
                           <ul class="child">
                               <li><a href="TPLpage.php?region=West_Malaysia"  nowrap>West Malaysia</a></li>
                               <li><a href="TPLpage.php?region=East_Malaysia"  nowrap>East Malaysia</a></li>
                        </ul>
                     </li>
                </ul>
            </li>
            <li class="parent"><a href="#">Information</a>
                <ul class="child">
                    <li><a href="support.html">FAQ</a></li>
                    <li><a href="touristSpot.html">Tourist Spots</a></li>
                </ul>
            </li>
            <li class="parent"><a href="Coupons.php">Deals</a></li>
        </ul>
        <div class = "container1"><h1>CLAIMED COUPONS</h1></div>
    <div class = "view">
        <?php 
    if (mysqli_num_rows($result) > 0) {                                                                     
            while($row  = mysqli_fetch_assoc($result))

            {                    
        ?>
            <div class = "coupon-card" > 
                <div class = "coupon-card-details">
                    
                    <div class = "coupon-card-picture" alt="responsive-image"> 
                        UP TO RM<?php echo $row['coupon_cap'] ?><br><?php echo $row['coupon_discount'] ?>% OFF
                        <div class = "circle1"></div>
                        <div class = "circle2"></div>
                        
                    </div>
                    
                </div>
                <div class = "coupon-card-details-bottom" alt="responsive-image"> 

                    UP TO RM<?php echo $row['coupon_cap'] ?><br><?php echo $row['coupon_discount'] ?>% OFF<br>
                     PROMO CODE: <?php echo $row['coupon_name'] ?>
                    <button class = "codeBtn"> CLAIMED </button>

                </div>
            </div>
        <?php
            }
        } else{
            echo "<h1>You have not claimed a coupon!</h1>";
        }
        ?>   
</div>
<div class="footer">
    <h2>Thanks to visit Asia Pacific Traveler</h2>
    <h6>© 2024  Asia Pacific Traveler. All rights reserved.</h6>
</div>
</body>
</html>


