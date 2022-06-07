<?php

//bindValue -> vincular com o retorno de uma função
//bindParam -> vincula somente com variável

//listar -> relatório

//consulta(id) -> buscaDados

//fetch -> retorna uma linha
// fetchAll -> retorna tudo

require("conf/Conexao.php");

class Usuario{

    private $idUsuario;
    private $nome;
    private $login;
    private $senha;

public function __construct($idUsuario, $nome, $login, $senha){

    $this->setId($idUsuario);
    $this->setNome($nome);
    $this->setLogin($login);
    $this->setSenha($senha);

    }

    public function getId(){ return $this->idUsuario; }
    public function setId($idUsuario){
        if ($idUsuario > 0)
        $this->idUsuario = $idUsuario;
    }

    public function getNome(){ return $this->nome; }
    public function setNome($nome){
        if (strlen($nome) > 0)
        $this->nome = $nome;
    }

    public function getLogin(){ return $this->login; }
    public function setLogin($login){
        if (strlen($login) > 0 )
        $this->login = $login;

    }

    public function getSenha(){ return $this->senha; }
    public function setSenha($senha){
        if (strlen($senha) > 0 )
        $this->senha = $senha;

    }

    public function __toString(){
        
        return "<br>ID de Usuário:" .$this->getId()
                ."<br> Nome de Usuário:" .$this->getNome()
                ."<br> Login de Usuário:" .$this->getLogin()
                ."<br> Senha de Usuário:" .$this->getSenha();
        }

    public function editar(){ //função para editar os dados que são citados ali embaixo :P

        $conexao = Conexao::getInstance();
        $query = 'UPDATE usuario 
        SET nome = :nome, login = :login, senha = :senha where idUsuario = :idUsuario';

    $stmt = $conexao->prepare($query);
    $stmt->bindParam(':idUsuario', $this->idUsuario);
    $stmt->bindParam(':nome', $this->nome);
    $stmt->bindParam(':login', $this->login);
    $stmt->bindParam(':senha', $this->senha);

    return $stmt->execute();

    }

    public function listar($tipo = 0, $info = ""){ //listar todos os registros do banco no index

        $conexao = Conexao::getInstance();
        //montar sql comando para inserir os dados
        $sql = 'SELECT * FROM usuario ';
        //adicionar parâmetros
        if($tipo > 0)
            switch($tipo){
            case(1): $sql .= "WHERE idUsuario = :info"; break;
            case(2): $sql .= "WHERE nome like :info"; $info .="%"; break;
            case(3): $sql .= "WHERE login like :info"; $info .="%"; break;
            case(4): $sql .= "WHERE senha = :info"; break;
        }
        //preparar o comando
        $resultado = $conexao->prepare($sql);
        //vincular os parâmetros
        $resultado->bindValue(':info', $info, PDO::PARAM_STR);
        //executa a consulta no banco de dados ( query = consulta )
        $resultado->execute();
        return $resultado->fetchAll();
    }

    public function salvar(){
        $conexao = Conexao::getInstance();
        $query = "INSERT INTO usuario (idUsuario, nome, login, senha) VALUES (:id, :nome, :login, :senha)";
        $resultado = $conexao->prepare($query);
        $resultado->bindValue(':id', $this->getId());
        $resultado->bindValue(':nome', $this->getNome());
        $resultado->bindValue(':login', $this->getLogin());
        $resultado->bindValue(':senha', $this->getSenha());

        if ($resultado->execute()){
            return $conexao->lastInsertId()."Salvo<br>";
        } else{
            return $resultado->debugDumpParams();
        }
    }

    public function excluir(){
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('DELETE from usuario WHERE idUsuario = :idUsuario');
            $stmt->bindParam(':idUsuario', $this->idUsuario, PDO::PARAM_INT);
            return $stmt->execute();
            
    }

    public function efetuarLogin($login, $senha) {
        $conexao = Conexao::getInstance();
        $login = $this->listar('nome', "login = '$login' AND senha = '$senha'");
        if($login){
            $_SESSION["nome"] = $login[0]['nome'];
            return true;
        }else{
            return false;
        }
    }
 }



?>

