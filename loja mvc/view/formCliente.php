<?php

require_once 'class/class_cliente.php';

$c = new cliente();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Cadastrar Cliente</title>
        <meta charset="UTF-8">
        <link href="css/estiloFormularios.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        
        
        
        <style>
            img {
                width: 100%;
                height: 100%;
            }
        </style>

         
       
        
    </head>
    <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="formCliente.php">Cadastrar Cliente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="formProduto.php">Cadastrar Produto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="editarGerenciarClienteGrid.php">Editar/Gerenciar Cliente</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="gerenciarJogo.php">Editar/Gerenciar Jogo</a>
                </li>  
                <li class="nav-item">
                    <a class="nav-link" href="gridEntrega.php">Gerenciar Envio</a>
                </li>
           </ul>
        </nav>
        
            <img src="img/p1.jpg" class="mx-auto d-block">
            
        <?php

        if(isset($_POST['nome'])) {

            if(isset($_GET['CPF_up'])) {

            $CPF_upd = addslashes($_GET['CPF_up']);
            $cpf = addslashes($_POST['cpf']);
            $nome = addslashes($_POST['nome']);
            $telefone = addslashes($_POST['telefone']);
            $email = addslashes($_POST['email']);
            $endereco = addslashes($_POST['endereco']);
            $cidade = addslashes($_POST['cidade']);
            $estado = addslashes($_POST['estado']);
            $dtn = addslashes($_POST['dtNasc']);
            $usuario = addslashes($_POST['usuario']); 
            $senha = addslashes($_POST['senha']);

                if(!empty($cpf) && !empty($nome) && !empty($telefone) && !empty($email) && !empty($endereco) && !empty($cidade) && !empty($estado) && !empty($dtn) && !empty($usuario) && !empty($senha)) {
                    $c->atualizarDados($CPF_upd, $nome, $cpf, $telefone, $email,  $endereco, $cidade, $estado, $dtn, $usuario, $senha);

                }

            } 

            
            //CADASTRO
            else {
            
            $cpf = addslashes($_POST['cpf']);
            $nome = addslashes($_POST['nome']);
            $telefone = addslashes($_POST['telefone']);
            $email = addslashes($_POST['email']);
            $endereco = addslashes($_POST['endereco']);
            $cidade = addslashes($_POST['cidade']);
            $estado = addslashes($_POST['estado']);
            $dtn = addslashes($_POST['dtNasc']);
            $usuario = addslashes($_POST['usuario']); 
            $senha = addslashes($_POST['senha']);

            if(!empty($cpf) && !empty($nome) && !empty($telefone) && !empty($email) && !empty($endereco) && !empty($cidade) && !empty($estado) && !empty($dtn) && !empty($usuario) && !empty($senha)) {
                $c->cadastrarCliente($cpf, $nome, $telefone, $email, $endereco, $cidade, $estado, $dtn, $usuario, $senha);
            } 
                    

          }

     
        }

        ?>

        <?php

        if(isset($_GET['CPF_up'])) {

            $cpf_update = addslashes($_GET['CPF_up']);

            $res = $c->buscarDadosCliente($cpf_update);
        }

        ?>


        <div class="container" style="margin-top:100px">
            <h1>Cadastro de Clientes</h1>
            <form name="formCliente" method="POST" action="#cadCliente.php" class="was-validated">

            <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" class="form-control" id="cpf" placeholder="Digite seu CPF" name="cpf" required value="<?php if(isset($res)) {echo $res['CPF'];} ?>">
                </div>

                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" id="nome" placeholder="Digite seu nome" name="nome" required value="<?php if(isset($res)) {echo $res['nome'];} ?>">
                </div>

                <div class="form-group">
                    <label for="telefone">Telefone:</label>
                    <input type="text" class="form-control" id="telefone" placeholder="Digite seu numero de telefone" name="telefone" required value="<?php if(isset($res)) {echo $res['telefone'];} ?>">
                </div>

                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" class="form-control" id="email" placeholder="Digite seu email" name="email" required value="<?php if(isset($res)) {echo $res['email'];} ?>">
                </div>

                <div class="form-grup">
                    <label for="endereco">Endereço:</label><br>
                    <input type="text" class="form-control" id="endereco" placeholder="Rua, Numero Bairro" name="endereco" required value="<?php if(isset($res)) {echo $res['endereco'];} ?>">
                </div>                                                

                <div class="form-grup">
                    <label for="cidade">Cidade:</label><br>
                    <input type="text" class="form-control" id="cidade" placeholder="Digite sua cidade" name="cidade" required value="<?php if(isset($res)) {echo $res['cidade'];} ?>">
                </div>

                <div class="form-grup"><br>
                    <label for="estado">Estado:</label><br>
                    <select class="form-control" id="estado" name="estado" value="<?php if(isset($res)) {echo $res['estado'];} ?>"> <br>
    						<option value="AC">Acre</option>
    						<option value="AL">Alagoas</option>
    						<option value="AP">Amapá</option>
    						<option value="AM">Amazonas</option>
    						<option value="BA">Bahia</option>
    						<option value="CE">Ceará</option>
    						<option value="DF">Distrito Federal</option>
    						<option value="ES">Espírito Santo</option>
    						<option value="GO">Goiás</option>
    						<option value="MA">Maranhão</option>
    						<option value="MT">Mato Grosso</option>
    						<option value="MS">Mato Grosso do Sul</option>
    						<option value="MG">Minas Gerais</option>
    						<option value="PA">Pará</option>
    						<option value="PB">Paraíba</option>
    						<option value="PR">Paraná</option>
    						<option value="PE">Pernambuco</option>
    						<option value="PI">Piauí</option>
    						<option value="RJ">Rio de Janeiro</option>
    						<option value="RN">Rio Grande do Norte</option>
    						<option value="RS">Rio Grande do Sul</option>
    						<option value="RO">Rondônia</option>
    						<option value="RR">Roraima</option>
    						<option value="SC">Santa Catarina</option>
    						<option value="SP">São Paulo</option>
    						<option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                    </select>
                </div>

                        <div class="form-grup">
                            <label for="dtNasc">Data de Nascimento:</label>
                            <input type="date" class="form-control" id="dtNasc" placeholder="" name="dtNasc" required value="<?php if(isset($res)) {echo $res['dataNasci'];} ?>">
                        </div>

                        <div class="form-grup"><br>
                            <label for="usuario">Nome de Usuario:</label><br>
                            <input type="text" class="form-control" id="usuario" placeholder="Digite seu nome de usuario:" name="usuario" required value="<?php if(isset($res)) {echo $res['usuario'];} ?>">
                        </div>

                        <div class="form-grup">
                            <label for="senha">Senha:</label><br>
                            <input type="password" class="form-control" id="senha" placeholder="Digite sua senha:" name="senha" required value="<?php if(isset($res)) {echo $res['senha'];} ?>">
                        </div>

                        

                        <input type="submit" value="<?php if(isset($res)) {echo "ztualizar";} else {echo "Cadastrar";} ?>">
                
                    </form>
            </form>
        </div>       
    </body>
</html>