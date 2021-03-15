<?php

    class cliente {

    private $pdo;

    public function __construct($dbname, $host, $user, $senha) {

    try {
        $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$senha);
    } 
    catch (PDOException $e) {
        echo "Erro com banco de dados" .$e->getMesege();
    }

    catch (Exception $e) {
        echo "Erro fatal" .$e->getMesege();
    }
    
}
//BUSCAR DADOS E COLOCAR NA TABELA
    public function buscarDados() {

    $res = array();

    $cmd = $this->pdo->query("SELECT * FROM clientes ORDER BY nome");
    
    $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
    return $res;
}


    public function cadastrarCliente($cpf, $nome, $telefone, $email, $endereco, $cidade, $estado, $dtn, $username, $pass) {
        //VERIFICA SE JA A CADASTRO
        $cmd = $this->pdo->prepare("SELECT CPF from clientes WHERE email = :e");

        $cmd->bindValue(":e",$email);

        $cmd->execute();

        if($cmd->rowCount() > 0) {
            return false;
        }else{
            $cmd = $this->pdo->prepare("INSERT INTO clientes (CPF, nome, telefone, email, endereco, cidade, estado, dataNasci, usuario, senha) VALUES (:cpf, :n, :t, :e, :endc, :cdd, :estd, :dtn, :u, :s)");

            $cmd->bindValue(":cpf",$cpf);
            $cmd->bindValue(":n",$nome);
            $cmd->bindValue(":t",$telefone);
            $cmd->bindValue(":e",$email);
            $cmd->bindValue(":endc",$endereco);
            $cmd->bindValue(":cdd",$cidade);
            $cmd->bindValue(":estd",$estado);
            $cmd->bindValue(":dtn",$dtn);
            $cmd->bindValue(":u",$username);
            $cmd->bindValue(":s",$pass);
            $cmd->execute();

            return true;
        }

    }
    public function excluirCliente($cpf) {
        
        $cmd = $this->pdo->prepare("DELETE FROM clientes WHERE CPF = :cpf");

        $cmd->bindValue(":cpf",$cpf);

        $cmd->execute();
    }

    public function buscarDadosCliente($cpf) {

        $res = array();
        
        $cmd = $this->pdo->prepare("SELECT * FROM clientes WHERE CPF = :cpf");

        $cmd->bindValue(":cpf",$cpf);

        $cmd->execute();

        $res = $cmd->fetch(PDO::FETCH_ASSOC);

        return $res;
    }

    public function atualizarDados($cpf, $nome, $telefone, $email, $endereco, $cidade, $estado, $dtn, $username, $pass) {

        

        $cmd = $this->pdo->prepare("UPDATE clientes SET nome = :n, telefone = :t, email = :e, endereco = :endc, cidade = :cdd, estado = :estd, dataNasci = :dtn, usuario = :u, senha = :s WHERE CPF = :cpf");

            
            $cmd->bindValue(":n",$nome);
            $cmd->bindValue(":t",$telefone);
            $cmd->bindValue(":e",$email);
            $cmd->bindValue(":endc",$endereco);
            $cmd->bindValue(":cdd",$cidade);
            $cmd->bindValue(":estd",$estado);
            $cmd->bindValue(":dtn",$dtn);
            $cmd->bindValue(":u",$username);
            $cmd->bindValue(":s",$pass);
            $cmd->bindValue(":cpf",$cpf);
            $cmd->execute();

            

        

    }

    

}



?>