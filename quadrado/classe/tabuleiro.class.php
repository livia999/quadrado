<?php
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    class Tabuleiro{
        private $id;
        private $lado;

        public function __construct($id, $lado){
            $this->setId($id);
            $this->setLado($lado);     
        }

        public function __toString(){
            return  "<h3> ✾ tabuleiro ✾ </h3>".
                    "id: ". $this->getId(). "<br>".
                    "lado: ". $this->getLado() ."<br>".
                    "área: ". $this->area()."<br>".
                    "perímetro: ". $this->perimetro(). "<br>";
        }

        public function getId(){return $this->id;}
        public function setId($id){
            if ($id > 0){
                $this->id = $id;
            }
        }
       
        public function getLado(){return $this->lado;}
        public function setLado($lado){
            if($lado > 0) {
            $this->lado = $lado;
            }
        }
        
        public function perimetro (){
                    return $this->getLado() * 4;
                }

        public function area(){
            return $this->getLado() * $this->getLado();
                }

        
        public function desenha(){
            $figura = "<div style='width: ".$this->getLado()
            ."px; height: ".$this->getLado()."px;
             background: #000'></div>";
            return $figura;
        }

        public function listar($tipo = 0, $info = "" ){
            $pdo = Conexao::getInstance();

            $sql = 'SELECT * FROM tabuleiro';
            //adicionar parametros
            if ($tipo > 0) {
                switch ($tipo) {
                    case '1': $sql .= " WHERE id = :info"; break; 
                    case '2': $sql .= " WHERE lado LIKE :info"; $info .= "%"; break;
                }
            }

            $lista = $pdo->prepare($sql);

            if ($tipo > 0) 
                $lista->bindValue(':info',$info, PDO::PARAM_STR);
            
            $lista->execute();

            return $lista->fetchAll();

        }


        public function inserir(){
            $conexao = Conexao::getInstance();
            $query = "INSERT INTO tabuleiro (idTabuleiro, lado) VALUES (null,:lado)";
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(':lado', $this->getLado(), PDO::PARAM_INT);

            if ($stmt->execute()){
                return $conexao->lastInsertId()." Deu certo <br>";
            } else{
                return $stmt->debugDumpParams();
            }
        }

        public function editar(){ // função para editar os dados
            $conexao = Conexao::getInstance(); // cria a conexão
            $query = "UPDATE tabuleiro SET lado = :lado WHERE idTabuleiro = :id"; // update dos dados
            $editar = $conexao->prepare($query); // preparação da consulta | query = consulta
            $editar->bindValue(':lado', $this->getLado(), PDO::PARAM_STR);
            $editar->bindValue(':id', $this->getId(), PDO::PARAM_STR);
            return $editar->execute();
        }

        public function excluir(){
            $conexao = Conexao::getInstance();
            $excluir = $conexao->prepare('DELETE FROM tabuleiro WHERE idTabuleiro = :id');
            $excluir->bindValue(':id', $this->getId(), PDO::PARAM_STR); //preparação da consulta
            return $excluir->execute();
        }



        
    }

?>