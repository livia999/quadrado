<!DOCTYPE html>
<html lang="pt-br">
<head>

<style>

.texto{
    text-align: center;
    font-size: larger;  
    color: #deadff;
    -webkit-text-stroke-width: 1px;
    -webkit-text-stroke-color: #3e115c;
}

.tabela{
    border-color: #d18cff;
}

</style>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tabuleiro</title>
    <script>
        function excluirRegistro(url){
            if(confirm("Deseja excluir?"))
            location.href = url;
        }
    </script>
    <?php
        require_once ("classe/tabuleiro.class.php");

        
        $pesquisa = isset($_POST['consulta']) ? $_POST['consulta'] : ""; //consulta
        $id = isset($_POST['id']) ? $_POST['id'] : "";
        $lado = isset($_POST['lado']) ? $_POST['lado'] : "";
        $info = isset($_POST['info']) ? $_POST['info'] : "";
        $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : 0;
    ?>
    
</head>
<body>
<br>
    <center>
        <a href="menu.php">Menu</a>
        <h4 class="texto">Criar tabuleiro</h4>
    
        <form action="processaTabuleiro.php" method="POST">
                <label for="lado">Medida do tabuleiro</label>
                <input type="text" id="tabuleiro" name="tabuleiro">
                <br><br>
                <input type="submit" value="salvar" name="salvar">
                <br><br>
        </form>

        <form method="post">
        <fieldset>
            <legend>pesquisa: </legend>
            <input type="radio" name="tipo" value="1" <?php if ($tipo =="1") echo "checked" ?>>
            <label for="id">ID</label>
            <input type="radio" name="tipo" value="2" <?php if ($tipo =="2") echo "checked" ?>> 
            <label for="id">Tamanho</label><br><br>
            <input type="text" name="info" id="info" placeholder="enviar pesquisa">
            <input type="submit" name="info" id="info">

        </form>
        </fieldset class="field"> <br><br>

    <table border="5 px" class="tabela">
        <tr>
            <td>id</td>
            <td>tamanho</td>
            <td>editar</td>
            <td>excluir</td>
        </tr>
        <?php
            $tabuleiro = new Tabuleiro("","");//echo no tabuleiro;
            $lista = $tabuleiro->listar($tipo, $info);
            foreach ($lista as $item) {
                ?>
            <tr>
                <td><a href="showTabuleiro.php?lado=<?php echo $item['lado']?>&idTabuleiro=<?php echo $item['idTabuleiro']?>"><?php echo $item['idTabuleiro']; ?></td>
                <td><?php echo $item['lado']?></td>
                <td><a href="indexTabuleiro.php?acao=editar&id=<?php echo $item['idTabuleiro']?>&lado=<?php echo $item['lado']?>"><img class="icon" src="img/edit.png" alt=""></a></td>
                <td><a href="javascript:excluirRegistro('processaTabuleiro.php?acao=excluir&id=<?php echo $item['idTabuleiro']?>')"><img class="icon" src="img/delete.png" alt=""></a></td>
            </tr>
        <?php    
            }
        ?>
        </center>
    </table>
</body>
</html>