<?php

require_once 'class/class_jogo.php';

$j = new jogo("loja","localhost","root","");
?>





<!DOCTYPE html>
<html>
  <head>
    <title>Editar/Gerenciar jogo</title>
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
              <a class="nav-link" href="editarGerenciarClienteGrid.php">Editar/Gerenciar Cliente</a>
          </li>
          <li class="nav-item">
          <a class="nav-link active" href="gerenciarJogo.php">Editar/Gerenciar jogo</a>
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
          <th>Nome</th>
          <th>Genero</th>
          <th>Plataforma</th>
          <th>Codigo do Jogo</th>
          <th>Preço</th>
          <th>Foto</th>
        </tr>
    </thead>
    <?php

    $dados = $j->buscarDados();
    
    if(count($dados) > 0) {
        for ($i=0; $i < count($dados); $i++) {

            echo "<tbody>";

            foreach ($dados[$i] as $k => $v) {
                
                echo "<th>".$v."</th>";
            }
            
        
        ?>
         <th> 
            <a href="formProduto.php?codigoJogo_up=<?php echo $dados[$i] ['codigoJogo']; ?>">Editar</a> 
            <a href="gerenciarJogo.php?codigoJogo=<?php echo $dados[$i] ['codigoJogo']; ?>">Excluir</a>
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

if(isset($_GET['codigoJogo'])) {

  $cj_jogo = addslashes($_GET['codigoJogo']);

  $j->excluirJogo($cj_jogo);

  header("location: gerenciarJogo.php");

}