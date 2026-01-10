<?php 
require_once("connect.php");

if (isset($_GET["course_id"])) {
    $course_id = $_GET["course_id"];
    $course_name = $_GET["course_name"] ?? '';
    $course_time = $_GET["course_time"] ?? '';
    $course_date = $_GET["course_date"] ?? '';
    $duration_months = $_GET["duration_months"] ?? '';
    $duration_hours = $_GET["duration_hours"] ?? '';
    $course_type = $_GET["course_type"] ?? '';
    $students = $_GET["students"] ?? 0;
    $payments = $_GET["payments"] ?? '';
    $link = $_GET["link"] ?? '';

    $stmt = $con->prepare("INSERT INTO courses (course_id, course_name, course_time, course_date, duration_months, duration_hours, course_type, students, payments, link) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssiss", $course_id, $course_name, $course_time, $course_date, $duration_months, $duration_hours, $course_type, $students, $payments, $link);
    
    if($stmt->execute()){
        header("location:Admin.php?send=1");
    } else {
        header("location:Admin.php?send=0");
    }
} else {
    header("location:Admin.php?error=missing_id");
}
?>