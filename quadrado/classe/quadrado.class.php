<?php

//bindValue -> vincular com o retorno de uma função
//bindParam -> vincula somente com variável

//listar -> relatório

//consulta(id) -> buscaDados

//fetch -> retorna uma linha
// fetchAll -> retorna tudo

require_once("conf/Conexao.php");
require_once("forma.class.php");

class Quadrado extends Forma{ //quadrado vai herdar a forma

    private $lado;

public function __construct($id, $lado, $cor, $idTabuleiro){
    
    $this->setId($id);
    $this->setLado($lado);
    $this->setCor($cor);
    $this->setTabuleiro($idTabuleiro);
    self::$contador = self::$contador + 1;   

}


public function getLado(){ return $this->lado; }
public function setLado($lado){
    if ($lado > 0)
    $this->lado = $lado;
}

public function area(){
    return $this->lado * $this->lado;
}

public function perimetro(){
    return $this->lado * 4;
}

public function diagonal(){
    return $this->lado * sqrt(2);
}

public function __toString(){
    
    return   "Lado:" .$this->getLado()
            ."<br> Cor:" .$this->getCor()
            ."<br> Área:" .$this->area()
            ."<br> Perímetro:" .$this->perimetro()
            ."<br> Diagonal:" .$this->diagonal() 
            ."<br> Contador:" .self::$contador 
            ."<hr><br> Quadrado: <br>" .$this->desenha();
}

public function inserir(){

    $query = 'INSERT INTO quadrado (lado, cor, idTabuleiro) VALUES(:lado,:cor, :idTabuleiro)'; // : = padrão de nomenclatura do PDO

    $parametros = array(":lado"=>$this->getLado(),
                        ":cor"=>$this->getCor(),
                        ":idTabuleiro"=>$this->getTabuleiro());
    return parent::executaComando($query,$parametros); ;

}

    public function editar(){

        $conexao = Conexao::getInstance();
        $query = 'UPDATE quadrado 
        SET lado = :lado, cor = :cor, idTabuleiro = :idTabuleiro
        WHERE id = :id';

    $stmt = $conexao->prepare($query);
    $stmt->bindValue(':lado', $this->lado, PDO::PARAM_STR);
    $stmt->bindValue(':cor', $this->cor, PDO::PARAM_STR);
    $stmt->bindValue(':id', $this->id, PDO::PARAM_STR);
    $stmt->bindValue(':idTabuleiro', $this->idTabuleiro, PDO::PARAM_STR);

    return $stmt->execute();

    }

    public function listar($tipo = 0, $info = ""){ //listar todos os registros do banco no index
        // static = não precisa de um objeto pra usar ela
        $conexao = Conexao::getInstance();
        //montar sql comando para inserir os dados
        $sql = 'SELECT * FROM quadrado ';
        //adicionar parâmetros
        if($tipo > 0)
            switch($tipo){
            case(1): $sql .= "WHERE id = :info"; break;
            case(2): $sql .= "WHERE lado = :info"; break;
            case(3): $sql .= "WHERE cor = :info"; break;
            case(4): $sql .= "WHERE idTabuleiro = :info"; break;
        }
        //preparar o comando
        $resultado = $conexao->prepare($sql);
        
            $resultado->bindValue(':info',$info,PDO::PARAM_STR);
            $resultado->execute(); //executa a consulta no banco de dados ( query = consulta )
        return $resultado->fetchAll();
    }

    public function excluir(){
        $conexao = Conexao::getInstance();
        $stmt = $conexao->prepare('DELETE from quadrado WHERE id = :id');
            $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
            return $stmt->execute();
            
    }

    public function desenha(){

        $quad = "<style> .container{
            width:". $this->getLado() ."px;
            height:". $this->getLado() ."px;
            background:". $this->getCor()
            .";
            </style>". "<div class='container'></div>";
        return $quad;
        //string com getNome

    }

    public function calculaArea(){
        
    }
}

?>

