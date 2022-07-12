<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar cubo</title>
    <?php
        require_once("classe/autoload.php");

        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $lado = isset($_GET['lado']) ? $_GET['lado'] : "";
        $cor = isset($_GET['cor']) ? $_GET['cor'] : "";


        $figura = new Cubo($id,$lado,$cor,0);
        // figura -> novo da classe Losango
    ?>
</head>
<body>   
<center>


        <?php
            echo "<fieldset>";
            echo "<p> Cubo q(≧▽≦q) </p>";
            echo $figura;
            echo $figura->desenha(); //chamando a função que desenha o quadrado lá da classe

        ?>
<div class="container">
<div class="cube">
    <div class="front"></div>
    <div class="top"></div>
</div></div>
<br><br><br><br>

    <br><br><br>
    <a href="indexCubo.php">Voltar</a>
    </center>
</fieldset>
</body>
</html>