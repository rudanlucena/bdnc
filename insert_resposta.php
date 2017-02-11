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

                                            $id_user = $_POST['id_user'];
                                            $id_pergunta = $_POST['id_pergunta'];
                                            $resposta = $_POST['resposta'];

                                            $respostas_usuarios = $db->query("SELECT * from respostas_usuarios");
                                                $cont = 0;
                                                if($respostas_usuarios){
                                                      while ($resposta_usuario = $respostas_usuarios->fetch_assoc()){
                                                           if(($resposta_usuario['id_usuario'] == $id_user) and ($resposta_usuario['id_pergunta'] == $id_pergunta)){
                                                              $cont++;
                                                           }   
                                                      }
                                                    $respostas_usuarios->free();
                                                }
                                            

                                                if($cont > 0){?>
                                                        <div class="alert alert-danger">
                                                                        <strong>ERRO!</strong> você não pode votar mais de uma vez na mesma enquete
                                                                        <a href="listar_perguntas.php?id=<?=$id_user?>"><button type="button" class="btn btn-danger">ok</button>
                                                        </div><?php
                                                }else{
                                                                                      
                                           
                                                    $sql ="INSERT INTO respostas_usuarios (id_usuario, id_pergunta, resposta) 
                                                        values ('$id_user', '$id_pergunta', '$resposta')";

                                                        $result = mysqli_query( $db, $sql);
                                                         if(!$result) { ?>
                                                              <div class="alert alert-danger">
                                                                      <strong>Error!</strong>Não foi possivel votar nessa enquete.
                                                                      <a href="listar_perguntas.php?id=<?=$id_user?>"><button type="button" class="btn btn-danger">ok</button>
                                                                  </div> <?php
                                                         }else{ ?>                              
                                                                <div class="alert alert-success">
                                                                            <strong>Success!</strong>Voto realizado com sucesso.
                                                                                <a href="resultado.php?id_user=<?=$id_user?>&id_pergunta=<?=$id_pergunta?>"><button type="button" class="btn btn-primary">ok</button>
                                                                </div> <?php
                                                                                                
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

                       
