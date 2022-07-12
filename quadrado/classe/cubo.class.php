<?php

require_once("classe/autoload.php");

class Cubo extends Quadrado{ 

    public function __toString(){
    
        return   "Lados:" .$this->getLado()
                ."<br> Cor:" .$this->getCor()
                ."<br> Contador:" .self::$contador 
                ."<hr><br> Cubo: <br><br><br><br><br>" .$this->desenha();
    }

    public function desenha(){

        $Cubo = "
        <style> 
        
            .container{
            width:". $this->getLado() ."px;
            height:". $this->getLado() ."px;
            background-color:". $this->getCor()
            ."; perspective: 1000px
            margin: 100px auto 0;
        }
        .cube {
        transform-style: preserve-3d;
        width: 100%;
        height: 100%;
        position: relative;
        animation: spin 5s infinite linear;
        }

        .top {transform: rotateX(90deg) translateZ(100px);}
        .bottom {transform: rotateX(-90deg) translateZ(100px);}
        .right {transform: rotateX(-180deg) translateZ(100px);}
        .left {transform: rotateX(-90deg) translateZ(100px);}
        .front {transform: rotateX(0deg) translateZ(100px);}
        .back {transform: rotateX(-180deg) translateZ(100px);}
        
        
        @keyframes spin {
            from{
                transform: rotateX(0deg) rotateY(0deg);
            }
            to{
                transform: rotateX(360deg) rotateY(360deg);
            }
        }
        
        </style>
            ";
        return $Cubo;
        //string com getNome

    }
// o cubo é uma extensão do quadrado que é uma extensão da forma, logo
// ele já tem o lado, id, cor, idTabuleiro e contador


   
}

?>