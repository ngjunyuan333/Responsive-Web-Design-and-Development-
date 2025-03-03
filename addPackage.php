<?php
session_start();


$package_name = $_POST['package_name'];  
$region = $_POST['region'];
$package_image = $_POST['package_image'];
$hotel_picture = $_POST['hotel_picture'];
$location_picture = $_POST['location_picture'];
$bus_picture = $_POST['bus_picture'];
$plane_picture = $_POST['plane_picture'];
$hotel_details = $_POST['hotel_details'];
$location_details = $_POST['location_details'];
$bus_details = $_POST['bus_details'];
$plane_details = $_POST['plane_details'];
$package_price = $_POST['package_price'];
$package_details = $_POST['package_details'];

include "phpConn.php";

$check_query = "SELECT * FROM packages WHERE package_name = '$package_name'";
$check_result = mysqli_query($dbConn, $check_query);


if (mysqli_num_rows($check_result) > 0) {
    die("<script>alert('Package name already exists! Please choose a different name.');window.history.go(-1);</script>");
}


$sql = "INSERT INTO packages (package_name, package_details, region, package_image, hotel_image, location_image, bus_image, plane_image, hotel_details, location_details, bus_details, plane_details, package_price) 
        VALUES ('$package_name','$package_details' ,'$region','$package_image','$hotel_picture','$location_picture','$bus_picture','$plane_picture','$hotel_details','$location_details','$bus_details','$plane_details','$package_price')";

mysqli_query($dbConn, $sql);


if (mysqli_affected_rows($dbConn) <= 0) {
    die("<script>alert('Failed: Unable to insert data!');window.history.go(-1);</script>");
}


echo "<script>alert('Successfully added!'); window.location.href = 'admin_view_packages.php';</script>";

?>