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

$info = isset($_POST['info']) ? $_POST['info'] : "";
$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : 0; //padrão de pesquisa é o lado
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$lado = isset($_GET['lado']) ? $_GET['lado'] : 0;
$cor = isset($_GET['cor']) ? $_GET['cor'] : 0;
$idTabuleiro = isset($_GET['idTabuleiro']) ? $_GET['idTabuleiro'] : "";
$acao = isset($_GET['acao']) ? $_GET['acao'] : "";

//verificação


// para criar um objeto
// adicionar arquivo da classe
    //require_once("classe/quadrado.class.php")
//criar o objeto
    //$quad = new Nome($argumentos ou $parametros);
    //quad->insere();
    //$lista = $quad->listar();
    //foreach($lista as $linha){
    //    echo $linha['cor'];
    //}
 function lista_quad($id){
    $Quadrado = new Quadrado("", "", "", "");
    $lista = $Quadrado->buscar($id);

    foreach($lista as $dados){ // return nos dados do quadrado ( $dados )
        return $dados;
    }
 }
        if ($id > 0){ //chamar a função que vai listar o quadrado
            $dados = lista_quad($id);
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
<input type="text" readonly name="id" value="<?php if($acao == "editar") echo $dados[0]; ?>">
<!-- readonly para não ser possível editar -->

<br>

<label for="lado"> Lado </label>
<input type="text" name="lado" value="<?php if($acao == "editar") echo $dados[1];?>">

<br>

<label for="cor"> Cor </label>

<label for="cor"></label>
<input type="color" class="form-control form-control-color" id="cor" value="<?php if($acao == "editar") echo $dados[2]; ?>">
<br><br>
<select name="idTabuleiro"><br>

                    <?php
                        require_once "utils.php";
                            echo listarTabuleiro();
                    ?>

<input name="acao" value="salvar" id="acao" type="submit">
</form>
<br><br><br>
<form method="POST">
<label for="id">pesquisa: </label> 
<input type="text" id="consulta" name="consulta" value="<?php echo $info; ?>">
<br><br><legend>Método de pesquisa: </legend>
        <input type="radio" name="tipo" value="1" <?php if ($tipo == 1){echo 'checked';}?>> 
        <label for="id">ID</label>
        <input type="radio" name="tipo" value="2" <?php if ($tipo == 2){echo 'checked';}?>>
        <label for="lado">Lado</label>
        <input type="radio" name="tipo" value="3" <?php if ($tipo == 3){echo 'checked';} ?>>
        <label for="cor">Cor</label>
        <input type="submit">
        </form>
<br>

</form>

<table border="1" class="tabela">

       <tr><th>ID</th>
        <th>Lado</th> 
        <th>Cor</th> 
        <th>Editar</th>
        <th>Excluir</th>
    </tr>

    <?php
        $quadrado = new Quadrado("","","","");
        $lista = $quadrado->listar($tipo,$info);
        foreach ($lista as $linha) {
            $cor = str_replace('#','%23', $linha['cor']);

    ?>

</fieldset>
<tr>

<td><a href="show.php?id=<?php echo $linha['id'];?>&lado=<?php echo $linha['lado']?>&cor=<?php echo $cor; ?>"><?php echo $linha['id'];?></a></td>
<td><?php echo $linha["lado"] ?></td>
<td><?php echo $linha["cor"] ?></td>
<td><a href="index.php?acao=editar&id=<?php echo $linha['id'];?>'"><img class="icon" src="img/edit.png" alt=""></a></td>
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