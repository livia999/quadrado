<?php

    require_once("classe/tabuleiro.class.php");

    function exibir($key, $dado){
        $str = "<option value=0>Selecione uma opção</option>";
        foreach($dado as $linha){
            $str .= "<option value='".$linha[$key[0]]."'>ID: ".$linha[$key[0]]." Lado: ".$linha[$key[1]]."</option>";
        }
        return $str;
    }

    function listarTabuleiro(){
        $tabuleiro = new Tabuleiro("","");
        $lista = $tabuleiro->Listar();
        var_dump($lista);
        return exibir(array('idTabuleiro','lado'),$lista);
    }
?>