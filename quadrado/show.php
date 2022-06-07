<!DOCTYPE html>
<html lang="pt-br">
<head>

<style>

.corpo{
  background: linear-gradient(#ffcbdb 50%, rgba(205,235,215,0) 0) 0 0,
  radial-gradient(circle closest-side, #ffcbdb 53%, rgba(205,235,215,0) 0) 0 0,
  radial-gradient(circle closest-side, #ffcbdb 50%, rgba(205,235,215,0) 0) 55px 0 #fff0f5;
  background-size:110px 200px;
  background-repeat:repeat-x;

}

.field{

  width: 100px;
  border-color: #ffcbdb;
  border-width: 15px;

}

</style>
<center>
    <?php

    require_once("classe/quadrado.class.php");
    $id = isset($_GET['id']) ? $_GET['id'] : "1"; // : "1" -> padrão de ID 
    // verifica o id
    $lado = isset($_GET['lado']) ? $_GET['lado'] : "1"; // : "1" -> padrão de lado 
    // verifica o lado
    $cor = isset($_GET['cor']) ? $_GET['cor'] : "#000"; // : "#000" -> padrão de cor = nulo, logo preto 
    // verifica a cor
    $idTabuleiro = isset($_GET['idTabuleiro']) ? $_GET['idTabuleiro'] : 1;

?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show</title>
</head>
<body class="corpo">
<fieldset class="field">
<?php 
// joaquim = quadrado -> tarefa :D
// joaquina chama o joaquim pra fazer a tarefa dele, no caso chamar a __toString
$joaquim = new Quadrado($id, $lado, $cor, $idTabuleiro);
$joaquina = $joaquim->__toString();
echo $joaquina;

// ai o joaquim fez a tarefa dele

?>
</fieldset>
<br>
<a href="index.php">Voltar</a>
</center>
</body>
</html>