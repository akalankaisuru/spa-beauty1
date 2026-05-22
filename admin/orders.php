<?php
include "../includes/db.php";
include "../includes/admin_auth.php";

$orders = $conn->query("
SELECT orders.*, users.name
FROM orders
JOIN users ON orders.user_id = users.id
ORDER BY orders.id DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Orders</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

<h2>Orders</h2>

<table class="table table-bordered">

<tr>
<th>ID</th>
<th>User</th>
<th>Total</th>
<th>Date</th>
</tr>

<?php while($row=$orders->fetch_assoc()){ ?>

<tr>
<td><?= $row['id'] ?></td>
<td><?= $row['name'] ?></td>
<td>Rs <?= $row['total'] ?></td>
<td><?= $row['created_at'] ?></td>
</tr>

<?php } ?>

</table>

</div>

</body>
</html>