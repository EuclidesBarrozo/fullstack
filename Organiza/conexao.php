<?php

// $conn = new MySQli('localhost','root','','test');
// $conn = new MySQli('localhost','root','','testes');
$conn = new MySQli('localhost','id20366939_root','n_4aRIa+B+(QhcNy','id20366939_organiza');

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

?>