<?php
$conn = new MySQli('localhost','root','','santa_casa');

if($conn->connect_error)
    die("Connection failed: " . $conn->connect_error);
?>