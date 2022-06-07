<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mostrar</title>
    <?php
        require "classe/tabuleiro.class.php";

        $id = isset($_GET['idTabuleiro']) ? $_GET['idTabuleiro'] : 0;
        $lado = isset($_GET['lado']) ? $_GET['lado'] : "";

        $figura = new tabuleiro($id,$lado);
        // figura -> novo da classe tabuleiro
        // par $id e $lado
    ?>
</head>
<body>
    <center>
        <?php
            echo "<fieldset>".$figura;
            echo $figura->desenha()."</fieldset>"; //chamando a função que desenha o quadrado lá da classe

        ?>

    <a href="indexTabuleiro.php">Voltar</a>
    </center>

</body>
</html>