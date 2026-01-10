<?php 
require_once("connect.php");

if (isset($_GET["course_id"]) && isset($_GET["link"])) {
    $course_id = $_GET["course_id"];
    $link = $_GET["link"];

    $stmt = $con->prepare("UPDATE courses SET link = ? WHERE course_id = ?");
    $stmt->bind_param("ss", $link, $course_id);
    
    if($stmt->execute()){
        header("location:Admin.php?send=1&selected_course=$course_id");
    } else {
        header("location:Admin.php?send=0&selected_course=$course_id");
    }
} else {
    header("location:Admin.php?error=missing_params");
}
?>