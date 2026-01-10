<?php 
require_once("connect.php");

if (isset($_GET["course_id"]) && isset($_GET["course_type"])) {
    $course_id = $_GET["course_id"];
    $course_type = $_GET["course_type"];

    $stmt = $con->prepare("UPDATE courses SET course_type = ? WHERE course_id = ?");
    $stmt->bind_param("ss", $course_type, $course_id);
    
    if($stmt->execute()){
        header("location:Admin.php?send=1&selected_course=$course_id");
    } else {
        header("location:Admin.php?send=0&selected_course=$course_id");
    }
} else {
    header("location:Admin.php?error=missing_params");
}
?>