<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

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
          $id_user = $_GET['id_user'];
          $id_pergunta = $_GET['id_pergunta'];

    ?>
    
     <title>listar partidas</title>
     <link href="bootstrap-3.7/css/bootstrap.css" rel="stylesheet" media="screen"> 
     <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen"> 
     <link href="css/templatemo_style.css" rel="stylesheet" media="screen">        
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
              <li><a href="listar_perguntas.php?id=<?=$id_user?>"><span class="glyphicon glyphicon-list"></span>Listar Perguntas</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
              <li><a href="encerrar_sessao.php?id=<?=$id_user?>"><span class="glyphicon glyphicon-log-out"></span>Sair</a></li>
            </ul>
           
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>


      <div class="bg-image"></div>
      <div class="main-content">
          <div class="container">
              <div class="about-us">                        
                  <div class="content-inner">                            
                      <div class="our-team">

                                                  
                          <div class="row">                            

                              <?php
                                    $respostas_usuariosx = $db->query("SELECT * from respostas_usuarios WHERE id_usuario = '$id_user' AND id_pergunta = '$id_pergunta'");
                                        if(mysqli_affected_rows($db) > 0){
                                            Header("location:resultado.php?id_user=$id_user&id_pergunta=$id_pergunta"); 
                                        }
                                        else{ ?>
                                             <div class="alert alert-danger">
                                                        <strong>VOTO NÂO REGISTRADO </strong>para visualizar o resultado das enquetes você deve votar primeiro.
                                                        <a href="enquete.php?id_user=<?=$id_user?>&id_pergunta=<?=$id_pergunta?>"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>votar</button>
                                                  </div> <?php
                                        }



                                  
                              ?>

                          </div><!-- /.row -->    
                      </div> <!-- /.our-team -->
                  </div> <!-- /.content-inner -->          
              </div> <!-- /.about-us -->   
              
          </div><!-- /.container--> 
      </div><!-- /.main-content-->
 
</body>
    <?mysqli_close($db);?>
</html>