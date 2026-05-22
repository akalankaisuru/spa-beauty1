<?php
include "../includes/db.php";
include "../includes/admin_auth.php";

$id=$_GET['id'];

$product=$conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();

if($_POST){

$name=$_POST['name'];
$category=$_POST['category'];
$price=$_POST['price'];
$stock=$_POST['stock'];

$conn->query("UPDATE products SET
name='$name',
category='$category',
price='$price',
stock='$stock'
WHERE id=$id");

header("Location: dashboard.php");
}
?>

<form method="POST" class="container mt-5">

<h2>Edit Product</h2>

<input class="form-control mb-2" name="name" value="<?= $product['name'] ?>">

<input class="form-control mb-2" name="category" value="<?= $product['category'] ?>">

<input class="form-control mb-2" name="price" value="<?= $product['price'] ?>">

<input class="form-control mb-2" name="stock" value="<?= $product['stock'] ?>">

<button class="btn btn-primary">Update</button>

</form>