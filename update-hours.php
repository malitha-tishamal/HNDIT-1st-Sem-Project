<?php 
require_once("connect.php");

if (isset($_GET["course_id"]) && isset($_GET["duration_hours"])) {
    $course_id = $_GET["course_id"];
    $duration_hours = $_GET["duration_hours"];

    $stmt = $con->prepare("UPDATE courses SET duration_hours = ? WHERE course_id = ?");
    $stmt->bind_param("ss", $duration_hours, $course_id);
    
    if($stmt->execute()){
        header("location:Admin.php?send=1&selected_course=$course_id");
    } else {
        header("location:Admin.php?send=0&selected_course=$course_id");
    }
} else {
    header("location:Admin.php?error=missing_params");
}
?>