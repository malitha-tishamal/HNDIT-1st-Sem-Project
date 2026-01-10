<?php
session_start();
require_once("connect.php");

if (isset($_POST['login_sub'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Use prepared statements to prevent SQL Injection
    $stmt = $con->prepare("SELECT email, first_name, password FROM account WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // In a real app, use password_verify() with hashed passwords. 
        // But for this project migration, I'll stick to the original logic if it wasn't hashed.
        // Looking at the original code, it was plain text.
        if ($password === $row['password']) {
            $_SESSION["user"] = $row['first_name'];
            $_SESSION["email"] = $row['email'];
            header("Location: index.php?login=success");
            exit();
        } else {
            header("Location: index.php?login=fail&error=invalid_pass");
            exit();
        }
    } else {
        header("Location: index.php?login=fail&error=not_found");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>
