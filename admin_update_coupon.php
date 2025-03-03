<?php
include 'phpConn.php'; 

session_start();
if (!isset($_SESSION['customer_id']) || strpos($_SESSION['password'], 'admin') === false) {
    echo "<script>
            alert('You must be logged in and your password must contain the word \"admin\" to see more details.');
            window.location.href = 'Login.html';
        </script>";
}

if (isset($_GET['c_id'])) {
    $CouponId = $_GET['c_id'];

    $sql = "SELECT * FROM coupon_creation WHERE C_ID = $CouponId";
    $result = mysqli_query($dbConn, $sql);
    $coupon = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Coupon</title>
    <link rel = "stylesheet" href="Logo2.css">
    <link rel = "stylesheet" href="admin_coupons.css">
</head>

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
            <form action = "update_coupons.php" method="POST">
                <input type="hidden" name="Coupon_id" value="<?= $coupon['C_ID']; ?>">
                Up To RM<input class="input-bottom" id = "coupon_cap" name = "cap" type = "number" placeholder = "Insert CAP" value="<?= $coupon['coupon_cap']; ?>" required>
                Discount <input class="input-bottom" id = "coupon_discount" name = "discount" type = "number" placeholder = "Insert Discount%" value="<?= $coupon['coupon_discount']; ?>" required>
                PROMO CODE: <input class="input-bottom" id = "coupon_code" name = "code" type = "text" placeholder = "Insert Code" value="<?= $coupon['coupon_code']; ?>" required>
                <button type="submit" class = "codeBtn"> UPDATE COUPON </button>
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