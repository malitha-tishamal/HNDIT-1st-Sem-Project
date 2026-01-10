<?php
require_once("connect.php");
$res = mysqli_query($con, "DESCRIBE courses");
while($row = mysqli_fetch_assoc($res)) {
    echo $row['Field'] . "\n";
}
?>
