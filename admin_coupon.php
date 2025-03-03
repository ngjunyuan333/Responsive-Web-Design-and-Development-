<?php

session_start();
if (!isset($_SESSION['customer_id']) || strpos($_SESSION['password'], 'admin') === false) {
    echo "<script>
            alert('You must be logged in and your password must contain the word \"admin\" to see more details.');
            window.location.href = 'Login.html';
        </script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Coupons</title>
    <link rel = "stylesheet" href="Logo2.css">
    <link rel = "stylesheet" href="admin_coupons.css">
</head>
<style>

.multilevel-dropdown-menu{
        z-index: 1;
        
    }

.footer{
        text-align: center;
        background:rgb(40, 133, 255);
        padding:2rem;
        position: relative;
        width: auto;
        margin-top: 50px;
        bottom: 0;
    }



</style>
<body>
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
  <div class="table-wrapper">
    <div class = "coupon-card"> 
        <div class = "coupon-card-details">
            <div class = "coupon-card-picture"> 
                ENTER DETAILS<br>BELOW THE COUPON PICTURE!!!
                <div class = "circle1"></div>
                <div class = "circle2"></div>
            </div>
        </div>
        <div class = "coupon-card-details-bottom">
            <form action = "admin_add_coupons.php" method="POST">
                Up To RM<input class="input-bottom" id = "coupon_cap" name = "cap" type = "number" placeholder = "Insert CAP" required>
                Discount <input class="input-bottom" id = "coupon_discount" name = "discount" type = "number" placeholder = "Insert Discount%" required>
                PROMO CODE: <input class="input-bottom" id = "coupon_code" name = "code" type = "text" placeholder = "Insert Code" required>
                <button type="submit" class = "codeBtn"> ADD COUPON </button>
            </form>
        </div>
    </div>
   </div>
</div>

<div class="footer">
    <h2>Thanks to visit Asia Pacific Traveler</h2>
    <h6>© 2024  Asia Pacific Traveler. All rights reserved.</h6>
</div>



</body>
</html>
