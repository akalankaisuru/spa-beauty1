<?php
include "includes/db.php";

$id = $_GET['id'];
$type = $_GET['type'];

// increase quantity
if($type == "plus"){

$conn->query("
UPDATE cart 
SET qty = qty + 1 
WHERE id='$id'
");

}

// decrease quantity
if($type == "minus"){

$conn->query("
UPDATE cart 
SET qty = qty - 1 
WHERE id='$id'
");

// remove if qty becomes 0
$conn->query("
DELETE FROM cart 
WHERE qty <= 0
");

}

header("Location: cart.php");
?>