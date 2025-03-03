<?php


session_start();
include 'phpConn.php'; 

if (!isset($_SESSION['customer_id']) || strpos($_SESSION['password'], 'admin') === false) {
    echo "<script>
            alert('You must be logged in and your password must contain the word \"admin\" to see more details.');
            window.location.href = 'Login.html';
        </script>";
}

$sql = "SELECT * FROM coupon_creation";
$result = mysqli_query($dbConn, $sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Coupons</title>
    <link rel = "stylesheet" href="Logo2.css">
    <link rel = "stylesheet" href="Coupons.css">
</head>

<body>
<style>


.footer{
        text-align: center;
        background:rgb(40, 133, 255);
        padding:2rem;
        position: relative;
        width: auto;
        margin-top: 50px;
        bottom: 0;
    }
.codeBtn{

    width: 40%;

}

.side-by-side{



}

</style>

    <ul class="multilevel-dropdown-menu">
        <a href="admin_home_page.php"><img src="imresizer-1727321361667.png" class="logo" onclick="admin_home_page.php"></a>
        <a href="Login.html"><img src="pngwing.com.png" class="logo2" onclick="Login.html"></a>
        <li class="parent"><a href="#">Account Management</a>
            <ul class="child">
                    <li><a href="admin_register_customer.php">Add Account</a></li>
                    <li><a href="admin_account_edit.php">Edit Account</a></li>
                </ul>
            </li>
            <li class="parent"><a href="#">Travel Packges</a>
                <ul class="child">
                    <li><a href="admin_packages.php">Add package</a></li>
                    <li><a href="admin_view_packages.php">View package</a></li>
                </ul> 
            </li>
            <li class="parent"><a href="#">Coupons</a>
                <ul class="child">
                    <li><a href="admin_coupon.php">Add Coupons</a></li>
                    <li><a href="admin_edit_coupon.php">Edit Coupons</a></li>
                </ul>
            </li>
        </ul>

<div class = "view">
    <?php
    
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
                <div class = "side-by-side">
                    <button class="update" onclick="updateCoupon(<?= $row['C_ID']; ?>)"> Update </button>
                    
                    <button class="delete" onclick="deleteCoupon(<?= $row['C_ID']; ?>)"> Delete</button>
                </div>
            </div>
        </div>
        
        
        
        
        
        
        
<script>

function updateCoupon(CouponId) {
    if (confirm('Do you wish to update this coupon?')) {
        window.location.href = 'admin_update_coupon.php?c_id=' + CouponId;
    }
}

function deleteCoupon(CouponId) {
    if (confirm('Are you sure you want to delete this coupon?')) {
        window.location.href = 'admin_delete_coupon.php?c_id=' + CouponId;
    }
}

</script>

    <?php
    }
    ?>
</div>




        
<div class="footer">
    <h2>Thanks to visit Asia Pacific Traveler</h2>
    <h6>© 2024  Asia Pacific Traveler. All rights reserved.</h6>
</div>
</body>
</html>