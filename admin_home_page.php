<?php

session_start();
include ('db.php');

if (!isset($_SESSION['customer_id']) || strpos($_SESSION['password'], 'admin') === false) {
    echo "<script>
            alert('You must be logged in and your password must contain the word \"admin\" to see more details.');
            window.location.href = 'Login.html';
        </script>";
}

$customerQuery = $conn->query("SELECT COUNT(*) AS total FROM customers");
$customerCount = $customerQuery->fetch(PDO::FETCH_ASSOC)['total'];

$couponQuery = $conn->query("SELECT COUNT(*) AS total FROM coupon_creation");
$couponCount = $couponQuery->fetch(PDO::FETCH_ASSOC)['total'];

$packageQuery = $conn->query("SELECT COUNT(*) AS total FROM packages");
$packageCount = $packageQuery->fetch(PDO::FETCH_ASSOC)['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="imresizer-1727321361667.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asia Pacific Traveler</title>
    <link href="admin_home_page.css" rel="stylesheet" type="text/css">
</head>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="imresizer-1727321361667.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asia Pacific Traveler</title>
    <link href="admin_home_page.css" rel="stylesheet" type="text/css">
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

        <div class="side">
        <h2 style="text-align:center">Welcome to Asia Pacific Traveler admin page</h2>
        <div class="dashboard-stats">
            <a href="admin_account_edit.php" class="stat-box" style="text-decoration: none"> 
                <h3>Total Customer Accounts</h3>
                <p><?php echo $customerCount; ?></p>
            </a> 
            <a href="admin_edit_coupon.php" class="stat-box" style="text-decoration: none">  
                <h3>Total Available Coupons</h3>
                <p><?php echo $couponCount; ?></p>
            </a>
            <a href="admin_view_packages.php" class="stat-box" style="text-decoration: none">
                <h3>Total Travel Packages</h3>
                <p><?php echo $packageCount; ?></p>
            </a>
        </div>
        
        <div class="action-buttons">
            <a href="admin_register_customer.php" class="action-button">Add Customer Account</a>
            <a href="admin_packages.php" class="action-button">Add Packages</a>
            <a href="admin_coupon.php" class="action-button">Add Coupons</a>
        </div>
    </div>

    <div class="footer">
        <h2>Thanks for visiting Asia Pacific Traveler</h2>
        <h6>© 2024 Asia Pacific Traveler. All rights reserved.</h6>
    </div>
</body>
</html>