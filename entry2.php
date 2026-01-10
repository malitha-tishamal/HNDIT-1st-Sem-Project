<?php 
require_once("connect.php");

if (isset($_GET["sd_name"])) {
    $sd_name = $_GET["sd_name"];
    $sd_email = $_GET["sd_email"];
    $sd_date = date("Y-m-d"); // Use current date if not provided
    $sd_number = $_GET["sd_number"];
    $sd_message = $_GET["sd_message"];

    $stmt = $con->prepare("INSERT INTO contact (sd_name, sd_email, sd_date, sd_number, sd_message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $sd_name, $sd_email, $sd_date, $sd_number, $sd_message);

    if ($stmt->execute()) {
        header("Location: contact.php?datasend=1");
    } else {
        header("Location: contact.php?datasend=0");
    }
} else {
    header("Location: contact.php");
}
?>