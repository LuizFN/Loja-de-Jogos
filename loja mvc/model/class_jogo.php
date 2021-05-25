<?php

    class jogo {

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

    $cmd = $this->pdo->query("SELECT * FROM Jogos ORDER BY nomeJogo");
    
    $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
    return $res;
}


    public function cadastrarJogo($codjogo, $nome, $genero, $plataforma, $imgjogo) {
        //VERIFICA SE JA A CADASTRO
        $cmd = $this->pdo->prepare("SELECT codigoJogo from jogos WHERE nomeJogo = :nj");

        $cmd->bindValue(":nj",$nome);

        $cmd->execute();

        if($cmd->rowCount() > 0) {
            return false;
        }else{
            $cmd = $this->pdo->prepare("INSERT INTO jogos (codigoJogo, nomeJogo, genero, plataforma, imgJogo) VALUES (:cj, :nj, :g, :p, :img)");

            $cmd->bindValue(":cj",$codjogo);
            $cmd->bindValue(":nj",$nome);
            $cmd->bindValue(":g",$genero);
            $cmd->bindValue(":p",$plataforma);
            $cmd->bindValue(":img",$imgjogo);
            
            $cmd->execute();

            return true;
        }

    }

    public function excluirJogo($codjogo) {
        
        $cmd = $this->pdo->prepare("DELETE FROM jogos WHERE codigoJogo = :cj");

        $cmd->bindValue(":cj",$codjogo);

        $cmd->execute();
    }

    public function buscarDadosJogo($codjogo) {

        $res = array();
        
        $cmd = $this->pdo->prepare("SELECT * FROM jogos WHERE codigoJogo = :cj");

        $cmd->bindValue(":cj",$codjogo);

        $cmd->execute();

        $res = $cmd->fetch(PDO::FETCH_ASSOC);

        return $res;
    }

    public function atualizarDados($codjogo, $nome, $genero, $plataforma, $imgjogo) {

        

        $cmd = $this->pdo->prepare("UPDATE jogos SET nomeJogo = :nj, genero = :g, plataforma = :p, imgJogo = :img WHERE codigoJogo = :cj");

        $cmd->bindValue(":cj",$codjogo);
        $cmd->bindValue(":nj",$nome);
        $cmd->bindValue(":g",$genero);
        $cmd->bindValue(":p",$plataforma);
        $cmd->bindValue(":img",$imgjogo);
           
            $cmd->execute();

            

        

    }


    

}



?>