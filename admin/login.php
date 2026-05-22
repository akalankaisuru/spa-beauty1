<?php

session_start();
include "../includes/db.php";

if(isset($_POST['login'])){

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM users 
WHERE email='$email' 
AND password='$password'
AND role='admin'";

$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0){

$_SESSION['admin'] = $email;

header("Location: dashboard.php");
exit();

}else{
$error = "Invalid Login";
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: linear-gradient(135deg, #9937ad, #f15add);
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: Arial;
}

/* LOGIN CARD */
.login-box {
    width: 380px;
    background: rgba(255,255,255,0.95);
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0px 15px 40px rgba(0,0,0,0.4);
    backdrop-filter: blur(10px);
}

/* TITLE */
.login-title {
    text-align: center;
    font-weight: bold;
    margin-bottom: 20px;
}

/* INPUT STYLE */
.form-control {
    border-radius: 10px;
    padding: 10px;
}

/* LOGIN BUTTON */
.btn-login {
    width: 100%;
    background: #c348c3;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 10px;
    font-weight: bold;
    transition: 0.3s;
}

.btn-login:hover {
    background: #d24b9e;
    transform: scale(1.03);
}

/* BACK HOME BUTTON */
.btn-home {
    width: 100%;
    margin-top: 10px;
    border-radius: 10px;
}

/* ERROR */
.error {
    color: red;
    text-align: center;
    margin-bottom: 10px;
}
</style>

</head>

<body>

<div class="login-box">

    <h3 class="login-title">🔐 Admin Login</h3>

    <?php if(isset($error)) { ?>
        <div class="error"><?= $error ?></div>
    <?php } ?>

    <form method="POST">

        <input type="email" name="email" class="form-control mb-3" placeholder="Admin Email" required>

        <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

        <button name="login" class="btn btn-login">Login</button>

        <!-- BACK TO HOME BUTTON -->
        <a href="../index.php" class="btn btn-outline-dark btn-home">
            ⬅ Back to Home
        </a>

    </form>

</div>

</body>
</html>