<?php
include 'phpConn.php'; // Database connection

if (isset($_GET['package_id'])) {
    $packageId = $_GET['package_id'];

    // Delete the package from the database
    $deleteSql = "DELETE FROM packages WHERE P_ID = $packageId";
    if (mysqli_query($dbConn, $deleteSql)) {
        // Redirect to the package view page after deletion
        header('Location: admin_view_packages.php');
    } else {
        echo "Error deleting package: " . mysqli_error($dbConn);
    }
}
?>