<?php
    session_start();  
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='../css/estilo.css'>
    <?php
        require_once ("classe/usuario.class.php");

        $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : 0;
        $nome = isset($_GET['nome']) ? $_GET['nome'] : "";
        $login = isset($_GET['login']) ? $_GET['login'] : "";
        $senha = isset($_GET['senha']) ? $_GET['senha'] : "";
        $info = isset($_POST['info']) ? $_POST['info'] : "";
    ?>
    <script>
        function excluirRegistro(url){
            if(confirm("Deseja excluir?"))
            location.href = url;
        }
    </script>
</head>
<body>
<br>
<fieldset>
    <center>

    <center><fieldset class="field"><h4><a href="menu.php">Menu</a></h4><br></fieldset></center>

        <h4>Registro de usuário</h4>
        <form action="processaUsuario.php" method="POST">
        <label for="id">id: </label>
            <input type="text" readonly name="idUsuario" id="id" value="<?php if($acao == "editar") echo $id; ?>"><br>
            <label for="nome">Usuario: </label>
            <input type="text" name="nome" id="nome" value="<?php if($acao == "editar") echo $nome; ?>"><br>
            <label for="login">Login: </label>
            <input type="text" name="login" id="login" value="<?php if($acao == "editar") echo $login; ?>"><br>
            <label for="senha">Senha: </label>
            <input type="password" name="senha" id="senha"><br>
            <br><br>
            <input type="submit" value="salvar" name="salvar">
        </form>

        <br><br>

        <form method="POST">
        <h4>Pesquisar: </h4><br>
        <input type="radio" name="tipo" value="1" <?php if ($tipo =="1") echo "checked" ?>>
        <label for="id">ID de usuário </label>
        <input type="radio" name="tipo" value="2" <?php if ($tipo =="2") echo "checked" ?>>
        <label for="id">Nome de usuário </label>
        <input type="radio" name="tipo" value="3" <?php if ($tipo =="3") echo "checked" ?>>
        <label for="id">Nome do login </label><br>
        <input type="text" name="info" id="info" value=""><br>
        <input type="submit" name="procurar" id="procurar" > <br><br> 
        </form>
            <table border="5px">
                <tr>
                    <td>ID</td>
                    <td>nome</td>
                    <td>login</td>
                    <td>senha</td>
                    <td>editar</td>
                    <td>excluir</td>
                </tr>
        <?php
            $login = new Usuario("","","","");
            //echo $tab;
            $lista = $login->listar($tipo, $info);
            //var_dump($lista);
            foreach ($lista as $item) {
        ?>
                <tr>
                    <td><?php echo $item['idUsuario']; ?></td>
                    <td><?php echo $item['nome']?></td>
                    <td><?php echo $item['login']?></td>
                    <td><?php echo $item['senha']?></td>
                    <td><a href="indexUsuario.php?acao=editar&id=<?php echo $item['idUsuario']?>&nome=<?php echo $item['nome']?>&login=<?php echo $item['login']?>&senha=<?php echo $item['senha']?>"><img src="img/edit.png" alt=""></a></td>
                    <td><a href="javascript:excluirRegistro('processaUsuario.php?acao=excluir&id=<?php echo $item['idUsuario']?>')"><img class="icon" src="img/delete.png" alt="" ></a></td>
                </tr>
        <?php    
            }
        ?>
    </table>
    </center>
</body>
</fieldset>
</html>