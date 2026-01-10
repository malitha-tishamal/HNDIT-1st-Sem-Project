<?php 
require_once("connect.php");

if (isset($_GET["course_id"]) && isset($_GET["course_date"])) {
    $course_id = $_GET["course_id"];
    $course_date = $_GET["course_date"];

    $stmt = $con->prepare("UPDATE courses SET course_date = ? WHERE course_id = ?");
    $stmt->bind_param("ss", $course_date, $course_id);
    
    if($stmt->execute()){
        header("location:Admin.php?send=1&selected_course=$course_id");
    } else {
        header("location:Admin.php?send=0&selected_course=$course_id");
    }
} else {
    header("location:Admin.php?error=missing_params");
}
?>