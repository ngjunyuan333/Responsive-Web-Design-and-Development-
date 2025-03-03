<?php
session_start();
include "phpConn.php";
$update_message = ''; 

if (!isset($_SESSION['customer_id']) || strpos($_SESSION['password'], 'admin') === false) {
    echo "<script>
            alert('You must be logged in and your password must contain the word \"admin\" to see more details.');
            window.location.href = 'Login.html';
        </script>";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['Customer_ID']) && isset($_POST['Customer_name']) && isset($_POST['Customer_email']) && isset($_POST['Customer_password'])) {
        
        $customer_ids = $_POST['Customer_ID'];
        $customer_names = $_POST['Customer_name'];
        $customer_emails = $_POST['Customer_email'];
        $customer_passwords = $_POST['Customer_password'];
        
        if (count($customer_ids) > 0) {
            foreach ($customer_ids as $index => $customer_id) {
                if (!empty($customer_id)) {
                    $customer_name = mysqli_real_escape_string($dbConn, $customer_names[$index]);
                    $customer_email = mysqli_real_escape_string($dbConn, $customer_emails[$index]);
                    $customer_password = mysqli_real_escape_string($dbConn, $customer_passwords[$index]);

                    if (!empty($customer_id)) {
                        $update_query = "UPDATE customers 
                                         SET Customer_name='$customer_name', Customer_email='$customer_email', customer_password='$customer_password'
                                         WHERE Customer_ID='$customer_id'";

                        if (mysqli_query($dbConn, $update_query)) {
                            $update_message = "Customer details updated successfully!";
                        } else {
                            $update_message = "Error updating record: " . mysqli_error($dbConn);
                        }
                    }
                }
            }
        }
    } else {
        echo "Error: Form data is missing.";
    }
}

$query = "SELECT * FROM customers";
$result = mysqli_query($dbConn, $query);

if (!$result) {
    die("Database query failed: " . mysqli_error($dbConn));
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer Accounts</title>
    <link href="admin_account_edit.css" rel="stylesheet" >
    <script>
        function showPopup(message) {
            alert(message);
        }
    </script>
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

    <h1 style="text-align:center">Account Management</h1>

    <form action="admin_account_edit.php" method="POST">
    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td><input type='text' name='Customer_ID[]' value='" . $row['Customer_ID'] . "' readonly></td>";
                    echo "<td><input type='text' name='Customer_name[]' value='" . $row['Customer_name'] . "'></td>";
                    echo "<td><input type='text' name='Customer_email[]' value='" . $row['Customer_email'] . "'></td>";
                    echo "<td><input type='text' name='Customer_password[]' value='" . htmlspecialchars($row['Customer_password']) . "'></td>";
                    echo "<td><button type='submit' name='submit' value='" . $row['Customer_ID'] . "'>Update</button></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        </div>
        <input type="submit" value="Update All Customers" class="center-button">
    </form>

    <?php
    if (!empty($update_message)) {
        echo "<script>showPopup('$update_message');</script>";
    }
    ?>

    <div class="footer">
        <h2>Thanks for visiting Asia Pacific Traveler</h2>
        <h6>© 2024 Asia Pacific Traveler. All rights reserved.</h6>
    </div>

</body>
</html>