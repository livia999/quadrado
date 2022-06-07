<?php 
   
    require_once "classe/tabuleiro.class.php"; //conectar  com a classe do tabuleiro
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    $editar = isset($_POST['nome']) ? $_POST['nome'] : "";
    $salvar = isset($_POST['salvar']) ? $_POST['salvar'] : "";

    if($acao == "excluir"){

        $id = isset($_GET['id']) ? $_GET['id'] : "";
        $tabuleiro = new Tabuleiro($id,"","");
        $resultado = $tabuleiro->excluir();

    }
    
    if ($editar == "enviar") {
        
        $id = isset($_POST['id']) ? $_POST['id'] : "";
        $lado = isset($_POST['lado']) ? $_POST['lado'] : "";
        $tabuleiro = new Tabuleiro($id, $lado);
        $resultado = $tabuleiro->editar();
    }


    if ($salvar == "salvar") {
        $id = isset($_POST['id']) ? $_POST['id'] : "";
        $tabuleiro = isset($_POST['tabuleiro']) ? $_POST['tabuleiro'] : "";
        $tabuleiro = new Tabuleiro($id,$tab);
        $resultado = $tabuleiro->editar();

        var_dump($resultado);
    }

    if($resultado == true){
        header("location:indexTabuleiro.php"); 
    }else{   
        echo "Erro ao executar ação";
    }
?>