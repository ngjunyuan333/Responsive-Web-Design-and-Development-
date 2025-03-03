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
    <link rel="icon" href="imresizer-1727321361667.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asia Pacific Traveler - Register</title>
    <link href="Register.css" rel="stylesheet" type="text/css">
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
    <h2 style="text-align:center">Register to Asia Pacific Traveler</h2>
        <div class="fakeimg">
            <div class="register-box">
                <div class="register-header">
                   <header>Register</header>
                </div>
                <form action = "InsReg.php" method = "POST">
                    <div class="input-box">
                        <input type="text" class="input-field" name = "Name" placeholder="Full Name" autocomplete="off" required>
                    </div>
                    <div class="input-box">
                        <input type="email" class="input-field" name = "Email" placeholder="Email" autocomplete="off" required>
                    </div>
                    <div class="input-box">
                        <input type="password" class="input-field" name = "Password" placeholder="Password" autocomplete="off" required>
                    </div>
                    <div class="input-submit">
                        <button class="submit-btn" id="submit"></button>
                        <label for="submit">Register</label>
                    </div>
                </form>
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