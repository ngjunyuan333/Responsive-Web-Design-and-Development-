<?php

session_start();
include 'phpConn.php'; 

if (!isset($_SESSION['customer_id']) || strpos($_SESSION['password'], 'admin') === false) {
    echo "<script>
            alert('You must be logged in and your password must contain the word \"admin\" to see more details.');
            window.location.href = 'Login.html';
        </script>";
}

$sql = "SELECT * FROM packages";
$result = mysqli_query($dbConn, $sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Packages</title>
    <link rel="stylesheet" href="Logo2.css">
    <link rel="stylesheet" href="admin_view_packages.css">
</head>
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

<div class="container">
    <?php
    
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <div class="package-card">
            <div class="package-labels">RM<?= $row['package_price']; ?><br>Package Image: <?= $row['package_image']; ?></div>
            <div class="package-card-picture">
                
                <div class="package-card-picture-section">
                    <img src="<?= $row['package_image']; ?>" alt="package image">
                </div>
                <div class="package-card-picture-section">
                    <div class="small-section">
                        <div class="small-small-section">
                            <div class="package-small-labels">Hotel Image: <?= $row['hotel_image']; ?></div>
                            <img src="<?= $row['hotel_image']; ?>" alt="hotel image">
                        </div>
                        <div class="small-small-section">
                            <div class="package-small-labels">Location Image: <?= $row['location_image']; ?></div>
                            <img src="<?= $row['location_image']; ?>" alt="locationimage">
                        </div>
                        <div class="small-small-section">
                            <div class="package-small-labels">Bus Image: <?= $row['bus_image']; ?></div>
                            <img src="<?= $row['bus_image']; ?>" alt="busimage">
                        </div>
                        <div class="small-small-section">
                            <div class="package-small-labels">Plane Image: <?= $row['plane_image']; ?></div>
                            <img src="<?= $row['plane_image']; ?>" alt="plane image">
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class = "package-card-details">
                <div class = "package-card-details-background">
                    <div class="package-details">REGION: <?= $row['region']; ?></div>
                    <div class="package-details">PACKAGE NAME: <?= $row['package_name']; ?></div>
                    <div class="package-details">PACKAGE DETAILS: <?= $row['package_details']; ?></div>
                    <div class="package-details">HOTEL DETAILS: <?= $row['hotel_details']; ?></div>
                    <div class="package-details">LOCATION DETAILS: <?= $row['location_details']; ?></div>
                    <div class="package-details">BUS DETAILS: <?= $row['bus_details']; ?></div>
                    <div class="package-details">PLANE DETAILS: <?= $row['plane_details']; ?></div>
                </div>
            </div>
            <div class= "left-side">
                <button class="btnUpdate" onclick="updatePackage(<?= $row['P_ID']; ?>)">Update</button>
                <button class="btnDelete" onclick="deletePackage(<?= $row['P_ID']; ?>)">Delete</button>
            </div>
        </div>
         
    <?php
    }
    ?>
</div>
<script>

function updatePackage(packageId) {
    if (confirm('Do you wish to update this package?')) {
        window.location.href = 'admin_update_package.php?package_id=' + packageId;
    }
}

function deletePackage(packageId) {
    if (confirm('Are you sure you want to delete this package?')) {
        window.location.href = 'admin_delete_package.php?package_id=' + packageId;
    }
}

</script>

<div class="footer">
    <h2>Thanks to visit Asia Pacific Traveler</h2>
    <h6>© 2024  Asia Pacific Traveler. All rights reserved.</h6>
</div>
    
</body>
</html>





        