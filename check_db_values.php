<?php
require_once("connect.php");
$res = mysqli_query($con, "SELECT * FROM courses LIMIT 1");
$row = mysqli_fetch_assoc($res);
print_r($row);
?>
