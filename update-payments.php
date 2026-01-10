<?php 
require_once("connect.php");

if (isset($_GET["course_id"]) && isset($_GET["payments"])) {
    $course_id = $_GET["course_id"];
    $payments = $_GET["payments"];

    $stmt = $con->prepare("UPDATE courses SET payments = ? WHERE course_id = ?");
    $stmt->bind_param("ss", $payments, $course_id);
    
    if($stmt->execute()){
        header("location:Admin.php?send=1&selected_course=$course_id");
    } else {
        header("location:Admin.php?send=0&selected_course=$course_id");
    }
} else {
    header("location:Admin.php?error=missing_params");
}
?>