<?php
session_start();

$id = $_SESSION['customer_id'];  
$packageID = $_POST['packageid'];
$package_name = $_POST['packagename'];  
$package_pic = $_POST['packagepic'];

include "phpConn.php";  


$sql_check_wishlist = "SELECT * FROM wishlist WHERE Customer_ID = '$id' AND P_ID = '$packageID'";
$result_wishlist = mysqli_query($dbConn, $sql_check_wishlist);

if (mysqli_num_rows($result_wishlist) > 0) {
    echo "<script>alert('Package already in your wishlist!');window.history.go(-1);</script>";
} else {
   
    $sql_check_purchased = "SELECT * FROM purchased WHERE Customer_ID = '$id' AND P_ID = '$packageID'";
    $result_purchased = mysqli_query($dbConn, $sql_check_purchased);
    
    if (mysqli_num_rows($result_purchased) > 0) {
       
        echo "<script>alert('You have already ordered the package!');window.history.go(-1);</script>";
    } else {
        
        $sql_insert_wishlist = "INSERT INTO wishlist (Customer_ID, P_ID, package_name, package_picture) 
                                VALUES ('$id', '$packageID','$package_name', '$package_pic');";
        
        mysqli_query($dbConn, $sql_insert_wishlist);
        
        if (mysqli_affected_rows($dbConn) <= 0) {
            die("<script>alert('Failed to add to wishlist!'); window.history.go(-1);</script>");
        }
        
        echo "<script>alert('Successfully added to wishlist!'); window.history.go(-1);</script>";
    }
}

?>


