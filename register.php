<?php
include "includes/db.php";

if($_POST){

$name = $_POST['name'];
$email = $_POST['email'];

$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$conn->query("INSERT INTO users(name,email,password)
VALUES('$name','$email','$password')");

header("Location: login.php");
exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #2c1c2a, #928dab);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial;
        }

        .register-card {
            width: 380px;
            padding: 30px;
            border-radius: 15px;
            background: white;
            box-shadow: 0px 10px 30px rgba(0,0,0,0.3);
        }

        .register-title {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .btn-custom {
            width: 100%;
            background: #b800a6;
            color: white;
            border: none;
        }

        .btn-custom:hover {
            background: #a30090;
        }
    </style>
</head>

<body>

<div class="register-card">

    <h3 class="register-title">Create Account</h3>

    <form method="POST">

        <input class="form-control mb-3" name="name" placeholder="Full Name">

        <input class="form-control mb-3" name="email" placeholder="Email">

        <input class="form-control mb-3" type="password" name="password" placeholder="Password">

        <button class="btn btn-custom">Register</button>

    </form>

    <p class="text-center mt-3">
        Already have an account? <a href="login.php">Login</a>
    </p>

</div>

</body>
</html>