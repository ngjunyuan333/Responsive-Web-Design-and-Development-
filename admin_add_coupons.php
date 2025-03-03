<?php
session_start();

$cap = $_POST['cap'];
$discount = $_POST['discount'];
$code = $_POST['code'];

include "phpConn.php";

$sql_check = "SELECT * FROM coupon_creation WHERE coupon_code = '$code'";

$result = mysqli_query($dbConn,$sql_check);

if(mysqli_num_rows($result) > 0){
    
    echo "<script>alert('Code existed. Please use a different name!');window.history.go(-1);</script>";
}else{
    $sql1 = "INSERT INTO coupon_creation (coupon_cap, coupon_discount, coupon_code) VALUES ('$cap','$discount','$code')";
    
    mysqli_query($dbConn, $sql1);
    if(mysqli_affected_rows($dbConn) <= 0){
        die("<script>alert('Failed to add coupon!'); window.history.go(-1);</script>");
    }
    
    
    echo "<script>alert('Successfully added coupon!');</script>";
    echo "<script>window.location.href='admin_edit_coupon.php';</script>";


}

?>