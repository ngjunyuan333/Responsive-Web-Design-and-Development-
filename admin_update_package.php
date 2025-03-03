<?php
include 'phpConn.php'; 

session_start();
if (!isset($_SESSION['customer_id']) || strpos($_SESSION['password'], 'admin') === false) {
    echo "<script>
            alert('You must be logged in and your password must contain the word \"admin\" to see more details.');
            window.location.href = 'Login.html';
        </script>";
}


if (isset($_GET['package_id'])) {
    $packageId = $_GET['package_id'];

    // Fetch the package details based on the ID
    $sql = "SELECT * FROM packages WHERE P_ID = $packageId";
    $result = mysqli_query($dbConn, $sql);
    $package = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Package</title>
    <link rel="stylesheet" href="Logo2.css">
    <link rel="stylesheet" href="admin_packages.css">
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
<center><h1> UPDATE PACKAGE </h1></center>
<div class = "view">
    
    <div class = "container">
        <div class = "picturecontainer">
            <form action = "updatePackage.php" method = "POST" enctype="multipart/form-data">
               
                <input type="hidden" name="package_id" value="<?= $package['P_ID']; ?>">
                
              
                <center>
                <select class = "input" name="region" required = "required">
                    <option value = "">Please select a region</option>
                    <option value ="West_Malaysia" <?= ($package['region'] == 'West_Malaysia') ? 'selected' : ''; ?>>West Malaysia</option>
                    <option value ="East_Malaysia" <?= ($package['region'] == 'East_Malaysia') ? 'selected' : ''; ?>>East Malaysia</option>
                    <option value ="America" <?= ($package['region'] == 'America') ? 'selected' : ''; ?>>America</option>
                    <option value ="Europe" <?= ($package['region'] == 'Europe') ? 'selected' : ''; ?>>Europe</option>
                    <option value ="East_Asia" <?= ($package['region'] == 'East_Asia') ? 'selected' : ''; ?>>East Asia</option>
                </select><h2> Package Images</h2></center>

                <label for="pack_img">PACKAGE IMAGE: </label>
                <input id="pack_img" class="input" type="file" name="package_image" accept="image/*"><br>
                <label for="hotel_img">HOTEL IMAGE:</label>
                <input id="hotel_img" class="input" type="file" name="hotel_picture" accept="image/*"><br>
                <label for="location_img">LOCATION IMAGE:</label>
                <input id="location_img" class="input" type="file" name="location_picture" accept="image/*"><br>
                <label for="bus_img">BUS IMAGE:</label>
                <input id="bus_img" class="input" type="file" name="bus_picture" accept="image/*"><br>
                <label for="plane_img">PLANE IMAGE:</label>
                <input id="plane_img" class="input" type="file" name="plane_picture" accept="image/*"><br>
                
            </div>
            <div class = "detailscontainer">
                
                <input class = "input" type = "text" name="hotel_details" placeholder="Hotel Details" value="<?= $package['hotel_details']; ?>" required>
                <input class = "input" type = "text" name="location_details" placeholder="Location Details" value="<?= $package['location_details']; ?>" required>
                <input class = "input" type = "text" name="bus_details" placeholder="Bus Details" value="<?= $package['bus_details']; ?>" required>
                <input class = "input" type = "text" name="plane_details" placeholder="Plane Details" value="<?= $package['plane_details']; ?>" required>
                <input class = "input" type = "number" name="package_price" placeholder="Package Price " value="<?= $package['package_price']; ?>" required>
                <input class = "input" type = "text" name="package_name" placeholder="Package Name" value="<?= $package['package_name']; ?>" required>
                <input class = "input" type = "text" name="package_details" placeholder="Package Details" value="<?= $package['package_details']; ?>" required>
                
                
                <button type="submit" class="subButton"><font color="white">Update</font></button>
            </div>
        </form>
    </div>
</div>

<div class="footer">
    <h2>Thanks to visit Asia Pacific Traveler</h2>
    <h6>© 2024  Asia Pacific Traveler. All rights reserved.</h6>
</div>

</body>
</html>
