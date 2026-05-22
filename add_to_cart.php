<?php
session_start();
include "includes/db.php";

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user'];
$product_id = $_GET['id'];

// check if product already in cart
$check = $conn->query("
SELECT * FROM cart 
WHERE user_id='$user_id' AND product_id='$product_id'
");

if($check->num_rows > 0){

    // if exists → increase qty
    $conn->query("
    UPDATE cart 
    SET qty = qty + 1 
    WHERE user_id='$user_id' AND product_id='$product_id'
    ");

}else{

    // if not exists → insert new
    $conn->query("
    INSERT INTO cart(user_id,product_id,qty)
    VALUES('$user_id','$product_id',1)
    ");

}

header("Location: store.php");
?>