<?php 
require_once("connect.php");

if (isset($_GET["name"])) {
    $name = $_GET["name"];
    $nic_no = $_GET["nic_no"];
    $email = $_GET["email"];
    $number = $_GET["number"];
    $age = $_GET["age"];
    $gender = $_GET["gender"] ?? 'Prefer not to say';
    $city = $_GET["city"];
    $java = $_GET["java"] ?? 0;
    $web = $_GET["web"] ?? 0;
    $python = $_GET["python"] ?? 0;
    $iot = $_GET["iot"] ?? 0;
    $c1 = $_GET["c1"] ?? 0;
    $class = $_GET["class"] ?? 'Online';

    $stmt = $con->prepare("INSERT INTO students (name, nic_no, email, number, age, gender, city, java, web, python, iot, c1, class) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssisssiiiii", $name, $nic_no, $email, $number, $age, $gender, $city, $java, $web, $python, $iot, $c1, $class);

    if ($stmt->execute()) {
        header("Location: Register.php?success=1");
    } else {
        header("Location: Register.php?success=0");
    }
} else {
    header("Location: Register.php");
}
?>