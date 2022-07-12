<html>

<?php
require_once("classe/autoload.php");

$id = isset($_GET['id']) ? $_GET['id'] : 0;
$lado = isset($_GET['lado']) ? $_GET['lado'] : "";
$cor = isset($_GET['cor']) ? $_GET['cor'] : "";
$idTabuleiro = isset($_GET['idTabuleiro']) ? $_GET['idTabuleiro'] : 0;
$resultado = 0;
$acao = isset($_GET['acao']) ? $_GET['acao'] : ""; //se acão for excluir, o resultado é apagar
    if ($acao == "excluir"){
        $Cubo = new Cubo($id, "", "", "");
        $resultado = $Cubo->excluir();
        
    }else if ($acao == "salvar"){  
        if ($id > 0){ //editar ( porque a pessoa selecionou um id )
            echo $id;
            $Cubo = new Cubo($id, $lado, $cor, $idTabuleiro);
            $resultado = $Cubo->editar();          
        }else{                 //salvar       
            $Cubo = new Cubo($id, $lado, $cor, $idTabuleiro);
            $resultado = $Cubo->inserir();

        }

    }
    if($resultado == true)
        header("location:indexLos.php"); //deu certo
    else
        echo "Erro ao inserir dados."; //deu erro
                                       // inclusive quando da erro, dá certo, porque mostra que deu errado :P
?>
</html>