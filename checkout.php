<?php
include "includes/db.php";
session_start();

$user=$_SESSION['user'];

$total=0;

$result=$conn->query("
SELECT products.price,cart.qty
FROM cart
JOIN products ON cart.product_id=products.id
WHERE cart.user_id='$user'
");

while($row=$result->fetch_assoc()){
$total += $row['price'] * $row['qty'];
}

$conn->query("
INSERT INTO orders(user_id,total)
VALUES('$user','$total')
");

$conn->query("DELETE FROM cart WHERE user_id='$user'");

echo "Order Placed Successfully";
?>