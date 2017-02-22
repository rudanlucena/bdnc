<html>
<head>

      <?php  
          //esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente não fazer o login e digitar na barra de endereço do seu navegador o caminho para a página principal do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele não estiver feito o login não será criado a session, então ao verificar que a session não existe a página redireciona o mesmo para a index.php.
          session_start();
          if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
          {
            unset($_SESSION['login']);
            unset($_SESSION['senha']);
            header('location:index.php');
          }

          $logado = $_SESSION['login'];
          include("conexao.php");

          $id_user = $_SESSION['id_user'];
          $id_pergunta = $_GET['id_pergunta'];
      ?>

      <title>BDNC</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta charset="UTF-8">
      <link href="bootstrap-3.7/css/bootstrap.css" rel="stylesheet" media="screen">
      <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen"> 
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/templatemo_style.css">

      <style>
        .invisivel{
          display: none;
        }
      </style>

</head>      
<body>

      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">BDNC ENQUETES</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a href="listar_perguntas.php"><span class="glyphicon glyphicon-list"></span>Listar Perguntas</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
              <li><a href="encerrar_sessao.php"><span class="glyphicon glyphicon-log-out"></span>Sair</a></li>
            </ul>
           
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>


      <div class="bg-image"></div>
      <div class="main-content">
          <div class="container">
              <div class="row">

                <?php
                      $perguntas = $db->query("SELECT * from pergunta where id = '$id_pergunta'");
                          if(mysqli_affected_rows($db) > 0){
                             while ($pergunta = $perguntas->fetch_assoc()){
                ?>  
                              	<div class="col-md-12">

                              		 <form action="insert_resposta.php" method="post">
                              		 	  <div class="login-form">
                                        <h3><?php echo $pergunta['pergunta']?></h3>

                                          <div class="form-group log-status invisivel">
                                              <label>id_usuario</label>
                                              <input type="text" class="form-control" name="id_user" value='<?=$id_user?>' required readonly>
                                          </div>

                                          <div class="form-group log-status invisivel">
                                              <label>id pergunta</label>
                                              <input type="text" class="form-control" name="id_pergunta"  value='<?=$id_pergunta?>' required readonly>
                                          </div>

                              		 	  	  <div class="form-group">
                              		 	  	  	  <div class="resposta">
                                                 <label>Sim<label>
                                                 <input type="radio" name="resposta" value="sim"  required/>
                                              </div>
                              		 	  	  </div>

                                          <div class="form-group">
                                              <div class="resposta">
                                                 <label>Não<label>
                                                 <input type="radio" name="resposta" value="nao"  required/>
                                              </div>
                                          </div>

                                          <div class="form-group">
                                              <div class="resposta">
                                                 <label>Não sei<label>
                                                 <input type="radio" name="resposta" value="naosei"  required/>
                                              </div>
                                          </div>

                                          <div class="form-group">
                                             <button class="log-btn">Votar</button>
                                          </div>

                              		 	  </div>
                              		 </form>
                              	</div><!--/.col-md-12-->

              <?php         
                      }
                     $perguntas->free(); 
                  }                                  
              ?>
              
              </div><!--/.row-->	
          </div><!--/.container-->
      </div><!--/.main-content--> 
</body>
</html>      