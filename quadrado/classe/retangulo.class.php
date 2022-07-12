<?php

require("forma.class.php");

class Retangulo extends Forma{

    private $altura;
    private $base;

    public function __construct($id, $cor, $idTabuleiro, $altura, $base){ // parent referencia ao pai
        parent::__construct($id, $cor, $idTabuleiro);
        $this->setAltura($altura);
        $this->setBase($base);
        
    }

    public function getAltura(){ return $this->altura; }
    public function setAltura($altura){
        return $this->altura = $altura;
    }

    public function getBase(){ return $this->base; }
    public function setBase($base){
        return $this->base = $base;
    }

    public function __toString(){
        $str = parent::__toString();
        $str .= "Altura: ".$this->getAltura()
             .", Base: ".$this->getBase();

        return $str;
    }

}

$ret = new Retangulo(2, 'rosa', 1, 10, 40);
echo $ret;

?>