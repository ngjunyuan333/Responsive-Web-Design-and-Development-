<?php

session_start();
include 'phpConn.php'; // Include the database connection

// Get the selected package_id from SPpage.php
$packageId = isset($_GET['package']) ? htmlspecialchars($_GET['package']) : null;
if (!$packageId) {
    echo "No package selected.";
    exit;
}

// Fetch package details based on package_id
$sqlPackage = "SELECT * FROM packages WHERE P_ID = '$packageId'";
$resultPackage = mysqli_query($dbConn, $sqlPackage);

if (mysqli_num_rows($resultPackage) > 0) {
    // Fetch data for the selected package
    $packageData = mysqli_fetch_assoc($resultPackage);

    $hotelImage = $packageData['hotel_image'];
    $locationImage = $packageData['location_image'];
    $busImage = $packageData['bus_image'];
    $planeImage = $packageData['plane_image'];

    $packageDetails = $packageData['package_details'];
    $packageName = $packageData['package_name'];
    $total = $packageData['package_price']; // Assuming total price is stored in the package
    $packagePicture = $packageData['package_image'];
} else {
    echo "Package not found.";
    exit;
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="imresizer-1727321361667.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <link href="Logo2.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="Checkout3.css" type="text/css">
</head>
<style>
    body {
        background: #AFCEC0;
        
    }

    .footer {
        text-align: center;
        background: rgb(40, 133, 255);
        padding: 2rem;
        position: fixed;
        width: 100%;
        bottom: 0;
    }

    .multilevel-dropdown-menu {
        z-index: 1;
    }

    .Hotel {
        background-image: url('<?php echo $hotelImage; ?>');
        background-size: cover;
    }

    .Location {
        background-image: url('<?php echo $locationImage; ?>');
        background-size: cover;
    }

    .Bus {
        background-image: url('<?php echo $busImage; ?>');
        background-size: cover;
    }

    .Flight {
        background-image: url('<?php echo $planeImage; ?>');
        background-size: cover;
    }

    @media screen and (max-width: 1280px) {
        .footer {
            width: 95%;
            position: relative;
            
        }
    }


    @media screen and (max-width: 414px) {
        .footer {
            width: auto;
            position: relative;
        }
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
                    <li class="parent"><a href="scroll_sys.html">View Purchases</a></li>
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
                    <li><a href="#">About us</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Contact Information</a></li>
                    <li><a href="touristSPOT.html"> Tourist Spot</a><li>
                </ul>
            </li>
            <li class="parent"><a href="Coupons.php">Deals</a></li>
            <li class="parent"><a href="Food Page"> Food Page</a></li>
        </ul>



        <div class="side-by-side">
        <div class="detailscontainer">
            <h1>How would you like to pay?</h1>
            <form action="purchaseprocess.php" method="POST">
                <input type="hidden" name="hotel" value='<?php echo $hotelImage; ?>'>
                <input type="hidden" name="location" value='<?php echo $locationImage; ?>'>
                <input type="hidden" name="plane" value='<?php echo $planeImage; ?>'>
                <input type="hidden" name="bus" value='<?php echo $busImage; ?>'>
                <input type="hidden" name="package_details" value='<?php echo $packageDetails; ?>'>
                <input type="hidden" name="package_name" value='<?php echo $packageName; ?>'>
                <input type="hidden" name="total" value='<?php echo $total; ?>'>
                <input type="hidden" name="package_pic" value='<?php echo $packagePicture; ?>'>
                <input type="number" name="card_number" placeholder="Bank card no." class="input-card" required>
                <input type="text" name="card_holder" placeholder="Cardholder name" class="input-cardHolder" required>
                <input type="date" name="expiry_date" class="input" required>
                <input type="number" name="c_card" placeholder="CVV/CVC" class="input" required>
                <input type="text" name="code" placeholder="Coupon code" class="input"><br>
                <button type="submit" class="subButton"><font color="white">Pay</font></button>
            </form>
        </div>

        <div class="pricecontainer">
            <div class="viewblock">
                <div class="packageDetails">
                    <h2>Package details:</h2>
                    <h2><?php echo $packageDetails; ?></h2>
                </div>
                <div class="container">
                    <div class="Hotel"> </div>
                    <div class="Location"> </div>
                    <div class="Flight"> </div>
                    <div class="Bus"> </div>
                    <div class="Total">
                        <p>Total: RM<?php echo $total; ?></p>
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