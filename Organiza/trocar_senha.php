<?php

session_start();
function verificarLogin(){
    if (!isset($_SESSION["user"])){
        header('Location:./index.html');
    }
}
verificarLogin();

include_once("conexao.php");

$user = $_POST["user"];
$pass = $_POST["pass"];

$sql = "SELECT * FROM usuarios WHERE Usuario = '$user'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) >= 1){
    $pass = md5($pass);
    $sql = "UPDATE usuarios SET Senha='$pass' WHERE Usuario = '$user'";
    
    if(mysqli_query($conn, $sql)){
        $_SESSION["result"] = "6";
        header('Location:./senha.php');
    }
    else{
        $_SESSION["result"] = "7";
        header('Location:./senha.php');
    }
    
}
else{
    $_SESSION["result"] = "5";
    header('Location:./senha.php');
}

?>