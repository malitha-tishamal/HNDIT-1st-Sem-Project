<?php
session_start();
require_once("connect.php");

if (isset($_POST['register_sub'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    // Check if email already exists
    $stmt = $con->prepare("SELECT email FROM account WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    if ($stmt->get_result()->num_rows > 0) {
        header("Location: index.php?sign=0&error=exists");
        exit();
    }

    // Insert new account
    $stmt = $con->prepare("INSERT INTO account (email, password, first_name, last_name) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $email, $password, $first_name, $last_name);
    
    if ($stmt->execute()) {
        header("Location: index.php?sign=1");
        exit();
    } else {
        header("Location: index.php?sign=0");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>
