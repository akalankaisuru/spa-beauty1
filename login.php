<?php
include "includes/db.php";
session_start();

$error = "";

if($_POST){

$email = $_POST['email'];
$password = $_POST['password'];

$result = $conn->query("SELECT * FROM users WHERE email='$email'");
$user = $result->fetch_assoc();

if($user && password_verify($password, $user['password'])){

$_SESSION['user'] = $user['id'];
$_SESSION['role'] = $user['role'];

header("Location: index.php");
exit();

} else {
$error = "Invalid email or password!";
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #2c1c2c, #928dab);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial;
        }

        .login-card {
            width: 380px;
            padding: 30px;
            border-radius: 15px;
            background: white;
            box-shadow: 0px 10px 30px rgba(0,0,0,0.3);
        }

        .login-title {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .btn-custom {
            width: 100%;
            background: #e75cd2;
            color: white;
            border: none;
        }

        .btn-custom:hover {
            background: #d64ba8;
        }
    </style>
</head>

<body>

<div class="login-card">

    <h3 class="login-title">User Login</h3>

    <?php if($error != ""): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST">

        <input class="form-control mb-3" name="email" placeholder="Email">

        <input class="form-control mb-3" type="password" name="password" placeholder="Password">

        <button class="btn btn-custom">Login</button>

    </form>

</div>

</body>
</html>