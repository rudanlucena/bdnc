<html>
<head>

      <?php
            session_start();
            if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
            {
              unset($_SESSION['login']);
              unset($_SESSION['senha']);
              header('location:index.php');
            }

            $logado = $_SESSION['login'];
            $id_user = $_SESSION['id_user'];
      ?>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta charset="UTF-8">
      <link href="bootstrap-3.7/css/bootstrap.css" rel="stylesheet" media="screen">
      <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
      <link href="css/templatemo_style.css" rel="stylesheet" media="screen">
</head>

<body> 
    <div class="bg-image"></div>
    <div class="main-content">
        <div class="container">
            <div class="row">
                    <div class="col-md-12">

                        <?php    
                           if(session_destroy()){
                              echo '<div class="alert alert-success">
                                            <strong>Success!</strong> sessão encerrada com sucesso.
                                            <a href="index.php"><button type="button" class="btn btn-primary">ok</button>
                                    </div>';
                           }

                           else{
                              echo '<div class="alert alert-success">
                                            <strong>Erro!</strong> a sessão não foi finalizado corretamente.
                                            <a href="listar_perguntas.php"><button type="button" class="btn btn-primary">ok</button>
                                    </div>';
                           }
                        ?> 
                         
                    </div><!-- /.col-md-12-->
            </div><!--/.row-->
        </div><!--/.container-->
    </div><!--/.main-content-->

</body>
</html>













