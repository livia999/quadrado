<!DOCTYPE html>
<html lang="pt-br">
<head>

<style>

.corpo{
    background-color:white;
background-image: linear-gradient(90deg, rgba(200,0,0,.5) 50%, transparent 50%),
linear-gradient(rgba(200,0,0,.5) 50%, transparent 50%);
background-size:50px 50px;

}

.tabela{
    background-color: #fadce6;
}  

.field{
    size: 100px;
    width: 500px;
    background-color: #fadce6;
}


</style>

<?php

require("classe/quadrado.class.php");

$consulta = isset($_POST['consulta']) ? $_POST['consulta'] : "";
$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : 0; //padrão de pesquisa é o lado
$id = isset($_GET['id']) ? $_GET['id'] : 0;

$acao = isset($_GET['acao']) ? $_GET['acao'] : "";
$Quadrado;
if ($acao == 'editar'){
    $lista = Quadrado::listar(1, $id);
    $Quadrado = new Quadrado($id, $lista[0]['lado'], $lista[0]['cor'], $lista[0]['idTabuleiro']);
}
?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Inicial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script>
        function excluirRegistro(url){
            if (confirm("Deseja excluir?"))
                location.href = url;
        }
    </script>

</head> 
<body class="corpo">

<center><fieldset class="field"><h4><a href="menu.php">Menu</a></h4><br></fieldset></center>

<div class="container-fluid">
<center>
<fieldset style="background-color: white;" class="field">
<form action="processa.php" method="GET">

<br><label for="id">ID</label>
<input type="text" readonly name="id" value="<?php if($acao == "editar") echo $Quadrado->getId();?>">
<!-- readonly para não ser possível editar -->

<br>

<label for="lado"> Lado </label>
<input type="text" name="lado" value="<?php if($acao == "editar") echo $Quadrado->getLado();?>">

<br>

<label for="cor"> Cor </label>
<input type="color" name="cor" class="form-control form-control-color" id="cor" value="<?php if($acao == "editar") echo $Quadrado->getCor();?>">
<br><br>
<select name="idTabuleiro"><br>
    <?php
        require_once ("classe/tabuleiro.class.php");
        $lista = Tabuleiro::listar();
        $check = "";
        foreach($lista as $linha){
            if(isset($Quadrado))
                if ($Quadrado->getTabuleiro() == $linha['idTabuleiro'])
                $check = "selected";
    ?>
        <option <?=$check?> value="<?=$linha['idTabuleiro']?>"
        ><?php echo "Tab: ".$linha['idTabuleiro']." - Lado: ".$linha['lado']
        ?></option>

        <?php
            $check = "";
    }

        ?>

</select>
<input name="acao" value="salvar" id="acao" type="submit">
</form>
<br><br><br>
<form method="POST">
<label for="id">pesquisa: </label> 
<input type="text" id="consulta" name="consulta" value="<?php echo $consulta; ?>">
<br><br><legend>Método de pesquisa: </legend>
        <input type="radio" name="tipo" value="1" <?php if ($tipo == 1){echo 'checked';}?>> 
        <label for="id">ID</label>
        <input type="radio" name="tipo" value="2" <?php if ($tipo == 2){echo 'checked';}?>>
        <label for="lado">Lado</label>
        <input type="radio" name="tipo" value="3" <?php if ($tipo == 3){echo 'checked';} ?>>
        <label for="cor">Cor</label>
        <input type="radio" name="tipo" value="4" <?php if($tipo == 4){echo 'checked';}?>>
        <label for="idTabuleiro">ID Tabuleiro</label>
        <input type="submit">
        </form>
<br>

</form>

<table border="1" class="tabela">

       <tr><th>ID</th>
        <th>Lado</th> 
        <th>Cor</th> 
        <th>ID Tabuleiro</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>

    <?php
        $quadrado = new Quadrado("","","","");
        $lista = $quadrado->listar($tipo,$consulta);
        foreach ($lista as $linha) {
            $cor = str_replace('#','%23', $linha['cor']);

    ?>

</fieldset>
<tr>

<td><a href="show.php?id=<?php echo $linha['id'];?>&lado=<?php echo $linha['lado']?>&cor=<?php echo $cor; ?>"><?php echo $linha['id'];?></a></td>
<td><?php echo $linha["lado"] ?></td>
<td><?php echo $linha["cor"] ?></td>
<td><?php echo $linha["idTabuleiro"]?></td>
<td><a href="index.php?acao=editar&id=<?php echo $linha['id'];?>"><img class="icon" src="img/edit.png" alt=""></a></td>
<td><a href="javascript:excluirRegistro('processa.php?acao=excluir&id=<?php echo $linha['id'];?>')"><img class="icon" src="img/delete.png" alt=""></a></td>
        
</tr>

<?php
$quadrado = new Quadrado("", "","", ""); //fazer um novo quadrado e listar os registros
$lista = $quadrado->listar();

//foreach($lista as $item){ item é cada linha
//echo $item["id"]."-".$item["lado"]."-".$item["cor"];
//echo "<br>";

} 

?>

</table>
</center>
</div>
</body>
</html>