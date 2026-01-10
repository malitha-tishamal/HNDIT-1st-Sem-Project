<?php 
require_once("connect.php");

if (isset($_GET["course_id"]) && isset($_GET["students"])) {
    $course_id = $_GET["course_id"];
    $students = $_GET["students"];

    $stmt = $con->prepare("UPDATE courses SET students = ? WHERE course_id = ?");
    $stmt->bind_param("is", $students, $course_id);
    
    if($stmt->execute()){
        header("location:Admin.php?send=1&selected_course=$course_id");
    } else {
        header("location:Admin.php?send=0&selected_course=$course_id");
    }
} else {
    header("location:Admin.php?error=missing_params");
}
?>