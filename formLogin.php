




















<html>
    <head>
        <title>Cadastrar Cliente</title>
        <meta charset="UTF-8">
        
        <link href="css/estiloFormularios.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <style>
            .carousel-inner img {
              width: 100%;
              height: 100%;
            }
            </style>
    </head>
    <body>
        
        <div id="demo" class="carousel slide" data-ride="carousel">

            
            <ul class="carousel-indicators">
              <li data-target="#demo" data-slide-to="0" class="active"></li>
              <li data-target="#demo" data-slide-to="1"></li>
              <li data-target="#demo" data-slide-to="2"></li>
            </ul>
            
            <!-- The slideshow -->
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="img/plays.jpg" alt="Plastation" width="1100" height="500">
              </div>
              <div class="carousel-item">
                <img src="img/xbox.jpg" alt="xbox" width="1100" height="500">
              </div>
              <div class="carousel-item">
                <img src="img/gifit.jpg" alt="gifit" width="1100" height="500">
              </div>
            </div>
            
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>
          </div>
       
       
       
       
       
        <div class="divMaster">
                   
                <div class="container" style="margin-top:100px">
                <h1>Login:</h1>
                
                    <form name="formCliente" method="POST" action="#cadCliente.php" class="was-validated">

                        <div class="form-grup">
                        <label for="nome">Usuário:</label><br>     
                        <input type="text" class="form-control" id="usuario" placeholder="Digite seu nome de usuario" name="usuario" required>                       
                        </div>

                        <div class="form-grup">
                            <label for="senha">Senha:</label><br>     
                            <input type="password" class="form-control" id="senha" placeholder="Digite sua senha de acesso" name="senha" required>
                         </div>
                        
                         <button type="submit" name="btLogin" class="btn btn-primary">Login</button>
                        <button type="submit" name="btCadastrar" class="btn btn-primary">Cadastrar</button>
                        
                    </form>
                </div>
            
        </div>
    </body>
</html>