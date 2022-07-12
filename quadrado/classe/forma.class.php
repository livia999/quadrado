<?php

// super classe ( classe pai ) que define o que é comum para todas as formas :D
require_once("database.class.php");

abstract class Forma extends Database{ 

    private $id;
    private $cor;
    private $idTabuleiro;
    public static $contador = 0; // compartilhar entre tods os objetos

public function __construct($id, $cor, $idTabuleiro){
   // echo $cor;
    //die();
    $this->setId($id);
    $this->setCor($cor);
    $this->setTabuleiro($idTabuleiro);
    self::$contador = self::$contador + 1;   

}

public function getId(){ return $this->id; }
public function setId($id){
    if ($id > 0 )
    $this->id = $id;

}

public function getCor(){ return $this->cor; }
public function setCor($cor){
    if (strlen($cor) > 0 )
    $this->cor = $cor;
}

public function getTabuleiro(){ return $this->idTabuleiro; }
public function setTabuleiro($idTabuleiro){
    return $this->idTabuleiro = $idTabuleiro;
}


public function __toString(){
    
    return   "Cor: " .$this->getCor()
             ."<br> ID: ".$this->getId()
             ."<br> ID Tabuleiro: ".$this->getTabuleiro() ."<br>";
}

public abstract function desenha();
public abstract function calculaArea();
public abstract function editar();
public abstract function excluir();
public abstract function inserir();
public abstract function listar($tipo = 0, $info = "");

}

?>