<?php
include "../includes/db.php";
include "../includes/admin_auth.php";

$id=$_GET['id'];

$conn->query("DELETE FROM products WHERE id=$id");

header("Location: dashboard.php");
?>