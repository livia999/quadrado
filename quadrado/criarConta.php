<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar conta</title>
</head>
<body>

<h4>Registro de usuário</h4>
        <form action="processaUsuario.php" method="POST">
        <label for="id">id: </label>
            <input type="text" readonly name="idUsuario" id="id"><br>
            <label for="nome">Usuario: </label>
            <input type="text" name="nome" id="nome"><br>
            <label for="login">Login: </label>
            <input type="text" name="login" id="login"><br>
            <label for="senha">Senha: </label>
            <input type="password" name="senha" id="senha"><br>
            <br><br>
            <input type="submit" value="salvar" name="salvar">
        </form>

    
</body>
</html>