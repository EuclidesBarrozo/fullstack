<?php

$conn = new mysqli ('localhost','root', '', 'portall');

$sql = "Select * from portallafjls";

$res = $conn->query($sql);

$dados = array();

if($res){
    while($row = $res->fetch_assoc()){
        $dados[] = $row;
    }
}

echo json_encode($dados);

?>