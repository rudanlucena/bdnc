<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link href="bootstrap-3.7/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="css/templatemo_style.css" rel="stylesheet" media="screen">
</head>

<body>

    <div class="bg-image"></div>
    <div class="main-content">
        <div class="container">
            <div class="row">
                    <div class="col-md-12">

                            <?php
                                include("conexao.php"); 

                                            $sexo = $_POST['sexo'];
                                            $idade = $_POST['idade'];
                                            $renda = $_POST['renda'];
                                            $escolaridade = $_POST['escolaridade'];
                                            $lat = $_POST['lat'];
                                            $lng =$_POST['lng'];
                                            $email = $_POST['email'];
                                            $senha = $_POST['senha'];

                                                $emails = $db->query("SELECT email from usuario");
                                                $cont = 0;
                                                if($emails){
                                                      while ($lista = $emails->fetch_assoc()){
                                                           if($lista['email'] == $email){
                                                              $cont++;
                                                           }   
                                                      }
                                                    $emails->free();
                                                }

                                                if($cont > 0){?>
                                                        <div class="alert alert-danger">
                                                                        <strong>Email invalido!</strong> email ja cadastrado no sistema
                                                                        <a href="cadastro_usuario.php"><button type="button" class="btn btn-danger">ok</button>
                                                        </div><?php
                                                }else{
                                                                                      
                                           
                                                    $sql ="INSERT INTO usuario (sexo, idade, renda, escolaridade, lat, lng, email, senha) 
                                                        values ('$sexo', '$idade', '$renda', '$escolaridade', '$lat', '$lng', '$email', '$senha')";

                                                        $result = mysqli_query( $db, $sql);
                                                         if(!$result)
                                                              echo '<div class="alert alert-danger">
                                                                      <strong>Error!</strong>Não foi possivel realizar seu cadastro.
                                                                      <a href="cadastro_usuario.php"><button type="button" class="btn btn-danger">ok</button>
                                                                  </div>';
                                                         else
                                                            {                              
                                                                echo '<div class="alert alert-success">
                                                                            <strong>Success!</strong>Cadastro realizado com sucesso.
                                                                                <a href="index.php"><button type="button" class="btn btn-primary">ok</button>
                                                                       </div>';
                                                                                                
                                                            }
                                                }
                                mysqli_close($db);                            
                            ?>                          
                    </div><!-- /.col-md-12-->
            </div><!--/.row-->
        </div><!--/.container-->
    </div><!--/.main-content-->

</body>
</html>

                       
