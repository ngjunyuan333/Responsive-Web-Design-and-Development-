<?php
session_start();


$id = $_SESSION['customer_id'];  
$coupon_name = $_POST['code'];  
$discount = $_POST['discount'];
$cap = $_POST['cap'];
$status = $_POST['status'];

include "phpConn.php";  


$sql_check = "SELECT * FROM coupon WHERE Customer_ID = '$id' AND coupon_name = '$coupon_name'";
$result = mysqli_query($dbConn, $sql_check);

if(mysqli_num_rows($result) > 0){
    
    echo "<script>alert('You already have claimed the coupon!');window.history.go(-1);</script>";
} else {
    
    $sql1 = "INSERT INTO coupon (Customer_ID, coupon_name, coupon_discount, coupon_cap, coupon_status) VALUES ('$id', '$coupon_name','$discount','$cap','$status')";
    
    mysqli_query($dbConn, $sql1);
    
    if(mysqli_affected_rows($dbConn) <= 0){
        die("<script>alert('Failed to claim coupon!'); window.history.go(-1);</script>");
    }
    
    
    echo "<script>alert('Successfully claimed coupon code!');</script>";
    echo "<script>window.history.go(-1);</script>";
}

?>