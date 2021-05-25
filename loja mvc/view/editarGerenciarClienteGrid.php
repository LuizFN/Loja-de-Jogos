<?php

require_once 'class/class_cliente.php';

$c = new cliente("loja","localhost","root","");
?>





<!DOCTYPE html>
<html>
  <head>
    <title>Editar/Gerenciar Cliente</title>
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
              <a class="nav-link" href="formProduto.php">Cadastrar Produto</a>
          </li>
          <li class="nav-item">
              <a class="nav-link active" href="editarGerenciarClienteGrid.php">Editar/Gerenciar Cliente</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="gerenciarJogo.php">Editar/Gerenciar jogo</a>
          </li>
           <li class="nav-item">
              <a class="nav-link" href="gridEntrega.php">Gerenciar Envio</a>
          </li>
     </ul>
  </nav>
   
  <div class="container" style="margin-top:100px">
  <table class="table">
      <thead>
        <tr>
          <th>CPF</th>
          <th>Nome</th>
          <th>Telefone</th>
          <th>E-mail</th>
          <th>Endereco</th>
          <th>Cidade</th>
          <th>Estado</th>
          <th>Data Nascimento</th>
          <th>Usuario</th>
          <th>Senha</th>
        </tr>
    </thead>

    <?php

    $dados = $c->buscarDados();
    
    if(count($dados) > 0) {
        for ($i=0; $i < count($dados); $i++) {

            echo "<tbody>";

            foreach ($dados[$i] as $k => $v) {
                
                echo "<th>".$v."</th>";
            }
            
        
        ?>
         <th> 
              <a href="formCliente.php?CPF_up=<?php echo $dados[$i] ['CPF']; ?>">Editar</a> 
              <a href="editarGerenciarClienteGrid.php?CPF=<?php echo $dados[$i] ['CPF']; ?>">Excluir</a>
         </th> 
         
         <?php
         echo "</tbody>"; 
        }  
    }
    

    ?>

         
   
      
      
        
      
    </table>
  </div>
      
    
  </body>
</html>



<?php

if(isset($_GET['CPF'])) {

  $cpf_cliente = addslashes($_GET['CPF']);

  $c->excluirCliente($cpf_cliente);

  header("location: editarGerenciarClienteGrid.php");

}






?>