<html>

<?php
require_once("classe/quadrado.class.php");
require_once("conf/default.inc.php");
require_once("conf/Conexao.php");

$lado = isset($_GET['lado']) ? $_GET['lado'] : "";
$cor = isset($_GET['cor']) ? $_GET['cor'] : "";
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$idTabuleiro = isset($_GET['idTabuleiro']) ? $_GET['idTabuleiro'] : 0;
$resultado = 0;
$acao = isset($_GET['acao']) ? $_GET['acao'] : ""; //se acão for excluir, o resultado é apagar
    if ($acao == "excluir"){
        $Quadrado = new Quadrado($id, "", "", "");
        $resultado = $Quadrado->excluir();
        
    }else if ($acao == "salvar"){  
        if ($id > 0){ //editar ( porque a pessoa selecionou um id )
            $Quadrado = new Quadrado($id, $lado, $cor, $idTabuleiro);
            $resultado = $Quadrado->editar();          
        }else{                 //salvar       
            $Quadrado = new Quadrado($id, $lado, $cor, $idTabuleiro);
            $resultado = $Quadrado->inserir();

        }

    }
    if($resultado == true)
        header("location:index.php"); //deu certo
    else
        echo "Erro ao inserir dados."; //deu erro
                                       // inclusive quando da erro, dá certo, porque mostra que deu errado :P
?>
</html>