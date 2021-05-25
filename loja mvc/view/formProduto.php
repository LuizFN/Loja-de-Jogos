<?php

require_once 'class/class_jogo.php';

$j = new jogo("loja","localhost","root","");

?>

<html>
    <head>
        <title>Cadastrar Jogo</title>
        <meta charset="UTF-8">
    
        <link href="css/estiloFormularios.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="formCliente.php">Cadastrar Cliente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="formProduto.php">Cadastrar Produto</a>
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
        
        <?php

        if(isset($_POST['nome'])) {

            if(isset($_GET['codigoJogo_up'])) {

                $cj_update = addslashes($_GET['codigoJogo_up']);
                $codjogo = addslashes($_POST['codjogo']);
                $nome = addslashes($_POST['nome']);
                $genero = addslashes($_POST['genero']);
                $plataforma = addslashes($_POST['plataforma']);
                $imgjogo = addslashes($_POST['img']);
            

            if(!empty($codjogo) && !empty($nome) && !empty($genero) && !empty($plataforma) && !empty($imgjogo)) {
                $j->atualizarDados($cj_update, $codjogo, $nome, $genero, $plataforma, $imgjogo);
                }
            

            else{
                $codjogo = addslashes($_POST['codjogo']);
                $nome = addslashes($_POST['nome']);
                $genero = addslashes($_POST['genero']);
                $plataforma = addslashes($_POST['plataforma']);
                $imgjogo = addslashes($_POST['img']);
            

            if(!empty($codjogo) && !empty($nome) && !empty($genero) && !empty($plataforma) && !empty($imgjogo)) {
                $j->atualizarDados($codjogo, $nome, $genero, $plataforma, $imgjogo);
                }

            }

        }

    }

        ?>

        <?php

        if(isset($_GET['codigoJogo_up'])) {

            $cj_update = addslashes($_GET['codigoJogo_up']);

            $res = $j->buscarDadosJogo($cj_update);
        }

        ?>
        
                <div class="container" style="margin-top:100px">
                    <h1>Cadastro de Jogos</h1>
                    <form name="formCliente" method="POST" action="" class="was-validated">
                    <div class="form-group"> 
                        <label for="nome">Nome Jogo:</label><br>
                        <input type="text" class="form-control" id="nomejogo" placeholder="Digite o nome do jogo cadastrado" name="nome" required value="<?php if(isset($res)) {echo $res['nomeJogo'];} ?>">
                    </div>

                    <div class="form-group"> 
                        <label for="genero">Genero Jogo:</label><br>
                        <select class="form-control" id="genero" name="genero" value="<?php if(isset($res)) {echo $res['genero'];} ?>">
                                <option value="acao">Ação e Aventura</option>
                                <option value="luta">Luta</option>
                                <option value="rpg">RPG</option>
                                <option value="crd">Corrida</option>
                                <option value="esp">Esportes</option>
                                <option value="estrtg">Estrategia</option>
                                <option value="vv">Vida Virtual</option>
                                <option value="cg">Construção</option>
                                <option value="cg">Construção/Gerenciasmento</option>
                                <option value="mus">Musica</option>
                                <option value="tiro">Tiro</option>
                                <option value="inf">Infantil</option>
                                <option value="svo">Simulação Voo</option>
                                <option value="csu">Casual</option>
                                <option value="surv">Sobrevivencia</option><br><br>
                        </select>
                    </div>

                        <div class="form-group"> 
                            <label for="plataforma">Plataforma Jogo:</label>
                            <select class="form-control" id="plataforma" name="plataforma" value="<?php if(isset($res)) {echo $res['plataforma'];} ?>">
                                    <option value="ps3">Playstation 3</option>
                                    <option value="ps4">Playstation 4</option>
                                    <option value="ps5">Playstation 5</option>
                                    <option value="x360">Xbox 360</option>
                                    <option value="xone">Xbox one</option>
                                    <option value="xsc">Xbox series x</option>
                                    <option value="nint">Nintendo</option>
                                    <option value="pc">PC</option><br>
                            </select>
                        </div>

                    <div class="form-group">
                        <label for="codj">Codigo Jogo:</label><br>
                        <input type="text" class="form-control" id="codjogo" placeholder="Digite o codigo do jogo coorrespondente" name="codjogo" required value="<?php if(isset($res)) {echo $res['codigoJogo'];} ?>">
                    </div>

                    <div class="form-group">
                        <label for="codj">Preço:</label><br>
                        <input type="text" class="form-control" id="preco" placeholder="Preço" name="preco" required value="<?php if(isset($res)) {echo $res['codigoJogo'];} ?>">
                    </div>

                    <div class="form-group">
                        <label for="foto">IMG Jogo:</label><br>
                        <input type="file" class="form-control-file border" name="img" value="<?php if(isset($res)) {echo $res['imgJogo'];} ?>">
                    </div>
                        
                    <input type="submit" name="btCadastrar" value="<?php if(isset($res)) {echo "Atualizar";} else {echo "Cadastrar";} ?>">
                        


                    </form>
                </div>
    </body>
</html>