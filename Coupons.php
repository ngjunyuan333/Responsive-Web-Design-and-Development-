<?php

session_start();

if (!isset($_SESSION['customer_id'])) {
    echo "<script>
            alert('You must be logged in order to see coupons.');
            window.location.href = 'Login.html';
        </script>"; 
}

include "phpConn.php";

$sql = "SELECT * FROM coupon_creation";

$result = mysqli_query($dbConn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COUPONS</title>
    <link href="Logo2.css" rel="stylesheet" type="text/css">
    <link href="Coupons.css" rel="stylesheet">
</head>
<style>
    .footer{
        position: relative;
        width: auto;
        bottom: 0;

    }

    @keyframes appear{
    from{
        opacity: 0;
        scale: 0.5;
    }
    to{
        opacity: 1;
        scale: 1;
    }
 }
 
 .coupon-card{
    animation: appear linear;
    animation-timeline: view();
    animation-range: entry 0% cover 40%;
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
<div class = "container1"><h1>Deals!</h1><p>Unlock Savings, One Click at a Time!<p></div>

<div class = "view">
    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <div class = "coupon-card"> 
            <div class = "coupon-card-details">
                
                <div class = "coupon-card-picture"> 
                    UP TO RM<?= $row['coupon_cap']; ?><br><?= $row['coupon_discount']; ?>% OFF
                    <div class = "circle1"></div>
                    <div class = "circle2"></div>
                    
                </div>
                
            </div>
            <div class = "coupon-card-details-bottom"> 
                UP TO RM<?= $row['coupon_cap']; ?> <br><?= $row['coupon_discount']; ?>% OFF<br> PROMO CODE: <?= $row['coupon_code']; ?>
                <form action = "checkCoupons.php" method="POST">
                    <input type ="hidden" name="status" value="UNUSED">
                    <input type ="hidden" name="code" value="<?= $row['coupon_code']; ?>">
                    <input type ="hidden" name="discount" value="<?= $row['coupon_discount']; ?>">
                    <input type ="hidden" name="cap" value="<?= $row['coupon_cap']; ?>">
                    <button type="submit" class="codeBtn"> CLAIM COUPON </button>
                </form>
            </div>
        </div>
        
        
        

    <?php
    }
} else {
    
    echo "<h1>No coupons available!</h1>";
}
    ?>
</div>



<div class="footer">
    <h2>Thanks to visit Asia Pacific Traveler</h2>
    <h6>© 2024  Asia Pacific Traveler. All rights reserved.</h6>
</div>
    
</body>
</html>