<?php

include_once("./conexao.php");
session_start();

$user = $_POST["user"];
$senha = md5($_POST["pass"]);

$sql = "SELECT * FROM usuarios WHERE Usuario = '$user' AND Senha = '$senha'";
$sql = mysqli_query($conn, $sql);

if (mysqli_num_rows($sql) > 0){
    $_SESSION["user"] = $user;
    header('Location:./inicio.html');
}
else{
    header('Location:./index.html');
}
?>