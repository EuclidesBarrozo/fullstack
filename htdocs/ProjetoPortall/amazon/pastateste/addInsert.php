<?php 


echo json_encode($_POST);


$lista = $_POST['lista'];
$tipo = $_POST['tipo'];
$votacao = $_POST['votacao'];
$stream = $_POST['stream'];
$titulo = $_POST['titulo'];
$faixa = $_POST['faixa'];
$sinopes = $_POST['sinopes'];
$genero = $_POST['genero'];
$img = $_POST['img'];
$musica = $_POST['musica'];
$fundo = $_POST['fundo'];
$gene = $_POST['gene'];

$conn = new mysqli ('localhost','root', '', 'portall');
$sql = "INSERT INTO `portallafjls`(`lista`, `tipo`, `votacao`, `stream`, `titulo`, `faixa`, `sinopes`, `genero`, `img`, `fundo`, `gene`) VALUES ('$lista','$tipo','$votacao','$stream','$titulo','$faixa','$sinopes','$genero','$img','$fundo','$gene')";


$res = $conn->query($sql);


// echo "<script>location.href='add.html'</script>";




?>