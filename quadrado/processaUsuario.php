<?php
    session_start();
    require "classe/usuario.class.php";
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    $logar = isset($_POST['logar']) ? $_POST['logar'] : "";
    $salvar = isset($_POST['salvar']) ? $_POST['salvar'] : "";
    $editar = isset($_POST['editar']) ? $_POST['editar'] : "";

    if ($acao == "excluir"){

        $id = isset($_GET['id']) ? $_GET['id'] : "";
        $usuario = new Usuario($id,"","","");
        $resultado = $usuario->excluir();

    }

    if ($salvar == "salvar"){

        $id = isset($_POST['idUsuario']) ? $_POST['idUsuario'] : 0;
        $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
        $login = isset($_POST['login']) ? $_POST['login'] : "";
        $senha = isset($_POST['senha']) ? $_POST['senha'] : "";
        $usuario = new Usuario($id, $nome, $login, $senha);
        if($id > 0)
        $resultado = $usuario->editar();
        else
        $resultado = $usuario->salvar();
    }
    
    if($logar == "logar"){
        $login = isset($_POST['login']) ? $_POST['login'] : "";
        $senha = isset($_POST['senha']) ? $_POST['senha'] : "";
        $usuario = new Usuario("","",$login,$senha);

        if($usuario->efetuarLogin($login,$senha) == true ):
                header("location:index.php");
        else:
            header("location:login.php");
            exit;
        endif;
    }
    //header("location:login.php");
?>
