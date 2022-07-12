<!DOCTYPE html>
<html lang="pt-br">
<head>

<?php

require_once("classe/autoload.php");
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$lado = isset($_GET['lado']) ? $_GET['lado'] : 0;
$cor = isset($_GET['cor']) ? $_GET['cor'] : 0;
$idTabuleiro = isset($_GET['idTabuleiro']) ? $_GET['idTabuleiro'] : 0;
$acao = isset($_GET['acao']) ? $_GET['acao'] : "";

?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cubo</title>
    <script>
        function excluirRegistro(url){
            if (confirm("Deseja excluir?"))
                location.href = url;
        }
    </script>

</head> 
<body>

<center><fieldset class="field"><h4><a href="menu.php">Menu</a></h4><br></fieldset>

<fieldset style="background-color: white;" class="field">

<table border="1" class="tabela">

       <tr><th>ID</th>
        <th>Lado</th> 
        <th>Cor</th> 
        <th>ID Tabuleiro</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>

</fieldset>
<tr>
<?php
        $Cubo = new Cubo($id, $lado, $cor, 0);
        $lista = $Cubo->listar();
        foreach ($lista as $linha) {
            $cor = str_replace('#','%23', $linha['cor']);

    ?>

<td><a href="showCubo.php?id=<?php echo $linha['id'];?>&lado=<?php echo $linha['lado']?>&cor=<?php echo $cor; ?>"><?php echo $linha['id'];?></a></td>
<td><?php echo $linha["lado"] ?></td>
<td><?php echo $linha["cor"] ?></td>
<td><?php echo $linha["idTabuleiro"]?></td>
<td><a href="indexCubo.php?acao=editar&id=<?php echo $linha['id'];?>"><img class="icon" src="img/edit.png" alt=""></a></td>
<td><a href="javascript:excluirRegistro('processaCubo.php?acao=excluir&id=<?php echo $linha['id'];?>')"><img class="icon" src="img/delete.png" alt=""></a></td>
        
</tr>

<?php
$Cubo = new Cubo("", "","", ""); //fazer um novo cubo e listar os registros
$lista = $Cubo->listar();

        }

?>

</table>
</center>
</body>
</html>