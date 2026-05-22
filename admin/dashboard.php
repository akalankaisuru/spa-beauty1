<?php
include "../includes/db.php";
include "../includes/admin_auth.php";

$products = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

<h1>Admin Dashboard</h1>

<a href="add_product.php" class="btn btn-success">Add Product</a>
<a href="orders.php" class="btn btn-dark">Orders</a>
<a href="logout.php" class="btn btn-danger">Logout</a>

<table class="table table-bordered mt-3">

<tr>
<th>ID</th>
<th>Name</th>
<th>Category</th>
<th>Price</th>
<th>Stock</th>
<th>Action</th>
</tr>

<?php while($row = $products->fetch_assoc()) { ?>

<tr>
<td><?= $row['id'] ?></td>
<td><?= $row['name'] ?></td>
<td><?= $row['category'] ?></td>
<td>Rs <?= $row['price'] ?></td>
<td><?= $row['stock'] ?></td>
<td>

<a href="edit_product.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Edit</a>

<a href="delete_product.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Delete</a>

</td>
</tr>

<?php } ?>

</table>

</div>

</body>
</html>