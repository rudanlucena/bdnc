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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link href="../bootstrap-3.7/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="../css/templatemo_style.css" rel="stylesheet" media="screen">
</head>

<body>

    <div class="bg-image"></div>
    <div class="main-content">
        <div class="container">
            <div class="row">
                    <div class="col-md-12">

                            <?php
                                include("../conexao.php"); 

                                            $pergunta = $_POST['pergunta'];
                 
                                                    $sql ="INSERT INTO pergunta (pergunta) values ('$pergunta')";

                                                        $result = mysqli_query( $db, $sql);
                                                         if(!$result)
                                                              echo '<div class="alert alert-danger">
                                                                      <strong>Error!</strong>Não foi possivel cadastrar a pergunta.
                                                                      <a href="cadastro_pergunta.php"><button type="button" class="btn btn-danger">ok</button>
                                                                  </div>';
                                                         else
                                                            {                              
                                                                echo '<div class="alert alert-success">
                                                                            <strong>Success!</strong>pergunta cadastrada com sucesso.
                                                                                <a href="listar_perguntas.php"><button type="button" class="btn btn-primary">ok</button>
                                                                       </div>';
                                                                                                
                                                            }
                                                
                                mysqli_close($db);                            
                            ?>                          
                    </div><!-- /.col-md-12-->
            </div><!--/.row-->
        </div><!--/.container-->
    </div><!--/.main-content-->

</body>
</html>

                       
