<?php
session_start();

if (!isset($_SESSION['customer_id'])) {
    die("<script>alert('You must be logged in to edit your account!');window.location.href='Login.html';</script>");
}

$customer_id = $_SESSION['customer_id'];

include "phpConn.php";

$sql = "SELECT Customer_name, Customer_email, Customer_password FROM customers WHERE Customer_id = '$customer_id'";
$result = mysqli_query($dbConn, $sql);

if (mysqli_num_rows($result) == 0) {
    die("<script>alert('No user found!');window.location.href='index.php';</script>");
}

$row = mysqli_fetch_assoc($result);
$name = $row['Customer_name'];
$email = $row['Customer_email'];
$password = $row['Customer_password'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="imresizer-1727321361667.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asia Pacific Traveler - Edit Account</title>
    <link href="Register.css" rel="stylesheet" type="text/css">
</head>

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

    <div class="side">
        <h2 style="text-align:center">Account Management</h2>
        <div class="fakeimg">
            <div class="register-box">
                <div class="register-header">
                    <header>Change user profile here</header>
                </div>
                <form action="update.php" method="POST">
                   <div class="input-box">
                      <input type="text" class="input-field" name="Name" placeholder="Full Name" value="<?php echo htmlspecialchars($name); ?>" autocomplete="off" required>
                   </div>
                   <div class="input-box">
                       <input type="email" class="input-field" name="Email" placeholder="Email" value="<?php echo htmlspecialchars($email); ?>" autocomplete="off" required>
                   </div>
                   <div class="input-box">
                       <input type="password" class="input-field" name="Password" placeholder="New Password (Leave empty if not changing)" autocomplete="off">
                   </div>
                       <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>">
                   <div class="input-submit">
                       <button class="submit-btn" id="submit"></button>
                           <label for="submit">Update</label>
                      </div>
                </form>
                <form action="logout.php" method="POST">
                    <div class="input-submit">
                        <button class="submit-btn" id="logout">Logout</button>
                        <label for="logout">Logout</label>
                    </div>
                </form>
                <div class="sign-up-link">
                    <p>Already have an account? <a href="Login.html">Login here</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
          <h2>Thanks for visiting Asia Pacific Traveler</h2>
          <h6>© 2024 Asia Pacific Traveler. All rights reserved.</h6>
    </div>
</body>
</html>