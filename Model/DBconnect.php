<?php

$server_username = "root";
$server_password = "";
$server_host = "localhost";
$database = 'hokokusho2021';

$conn = mysqli_connect($server_host, $server_username, $server_password, $database) or die("データベースを連携できません！");
mysqli_query($conn, "SET NAMES 'UTF8'");

?>
