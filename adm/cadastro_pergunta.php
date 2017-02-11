<html>
<head>
      <?php  
          //esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente não fazer o login e digitar na barra de endereço do seu navegador o caminho para a página principal do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele não estiver feito o login não será criado a session, então ao verificar que a session não existe a página redireciona o mesmo para a index.php.
          session_start();
          if((!isset ($_SESSION['login_adm']) == true) and (!isset ($_SESSION['senha_adm']) == true))
          {
            unset($_SESSION['login_adm']);
            unset($_SESSION['senha_adm']);
            header('location:index.php');
          }

          $logado = $_SESSION['login_adm'];
      ?>
      <title>BDNC</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta charset="UTF-8">
      <link href="../bootstrap-3.7/css/bootstrap.css" rel="stylesheet" media="screen">
      <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
      <link rel="stylesheet" href="../css/style.css">
      <link rel="stylesheet" href="../css/templatemo_style.css">

</head>      
<body>
      <?php
        include("menu_adm.php");
      ?>
      <div class="bg-image"></div>
      <div class="main-content">
          <div class="container">
              <div class="row">
              	<div class="col-md-12">

              		 <form action="insert_pergunta.php" method="post">
              		 	  <div class="login-form">
              		 	  	  <div class="form-group">
                                <label>Pergunta:</label>
                                   <textarea class="form-control"  name="pergunta" required></textarea>
                          </div>

                           <div class="button_form">                              
                                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span>Salvar</button>
                          </div>
              		 	  </div>
              		 </form>
                                

              	</div><!--/.col-md-12-->
              </div><!--/.row-->	
          </div><!--/.container-->
      </div><!--/.main-content--> 

</body>
</html>      