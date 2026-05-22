<?php
$conn = new mysqli("localhost", "root", "", "spa_beauty");

if ($conn->connect_error) {
    die("Database connection failed");
}
?>