<?php
include 'phpConn.php'; // Database connection

if (isset($_GET['c_id'])) {
    $couponId = $_GET['c_id'];

    // Delete the package from the database
    $deleteSql = "DELETE FROM coupon_creation WHERE C_ID = $couponId";
    if (mysqli_query($dbConn, $deleteSql)) {
        // Redirect to the package view page after deletion
        header('Location: admin_edit_coupon.php');
    } else {
        echo "Error deleting coupon: " . mysqli_error($dbConn);
    }
}
?>