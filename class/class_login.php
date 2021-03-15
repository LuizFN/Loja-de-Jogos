<?php

    class login {


        private $pdo;

        

        public function conn($dbname, $host, $user, $senha) {
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

        public function logar($email, $senha) {

            $sql = $pdo->prrepare("SELECT CPF FROM clientes WHERE eemail = :e AND senha = :s ");

            $sql->bindValue(":e",$email);
            $sql->bindValue(":s",$senha);
            $sql->execute();

            if($sql->rowCount() > 0) {
                $dado = $sql->fetch();

                session_start();

                $_SESSION['CPF'] = $dado['CPF'];

                return true;

            }else (
                return false;
            )

        }


    
    }

?>