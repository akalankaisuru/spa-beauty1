<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Spa Beauty Products</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">

<a class="navbar-brand" href="index.php">
🌸 Spa Beauty
</a>

<button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="menu">

<ul class="navbar-nav ms-auto">

<li class="nav-item">
<a class="nav-link" href="index.php">Home</a>
</li>

<li class="nav-item">
<a class="nav-link" href="store.php">Store</a>
</li>

<li class="nav-item">
<a class="nav-link" href="cart.php">Cart</a>
</li>

<li class="nav-item">
<a class="nav-link" href="/spa-beauty/admin/login.php">Admin</a>
</li>

<?php if(isset($_SESSION['user'])) { ?>

<li class="nav-item">
<a class="nav-link" href="logout.php">Logout</a>
</li>

<?php } else { ?>

<li class="nav-item">
<a class="nav-link" href="login.php">Login</a>
</li>

<li class="nav-item">
<a class="nav-link" href="register.php">Register</a>
</li>

<?php } ?>

</ul>
</div>
</div>
</nav>