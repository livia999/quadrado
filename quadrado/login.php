<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<form action="processaUsuario.php" method="POST">
<label for="login">Login: </label>
            <input type="text" name="login" id="login"><br>
            <label for="senha">Senha: </label>
            <input type="password" name="senha" id="senha"><br>
            <br><br>
            <input type="submit" value="logar" name="logar">
        </form>


</body>
</html>