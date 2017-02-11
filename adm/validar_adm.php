<html>
<head>
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
                            // session_start inicia a sessão
                            session_start();

                            include("../conexao.php"); 
                                                  
                                        $email = $_POST['email'];
                                        $senha = $_POST['senha'];

                                            $result = mysqli_query($db, "SELECT * FROM login where email='$email' and senha='$senha'");

                                            if(mysqli_affected_rows($db) == 1){ 
                                                $_SESSION['login_adm'] = $login;
                                                $_SESSION['senha_adm'] = $senha;
                                                Header("location:listar_perguntas.php");                                                              
                                            }

                                            else{
                                                 echo '<div class="alert alert-danger">
                                                                <strong>Error!</strong> Não foi possivel efetuar o login.
                                                                <a href="index.php"><button type="button" class="btn btn-danger">ok</button>
                                                        </div>';

                                                        unset ($_SESSION['login']);
                                                        unset ($_SESSION['senha']);                             
                                            }
                                        
                            mysqli_close($db);
                        ?>  

                    </div><!-- /.col-md-12-->
            </div><!--/.row-->
        </div><!--/.container-->
    </div><!--/.main-content-->

</body>
</html>









