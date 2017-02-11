<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

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
          include("../conexao.php");
    ?>
    
     <title>listar partidas</title>
     <link href="../bootstrap-3.7/css/bootstrap.css" rel="stylesheet" media="screen"> 
     <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
     <link href="../css/templatemo_style.css" rel="stylesheet" media="screen"> 
       
</head>

<body>

      <?php
        include("menu_adm.php");
      ?>

      <div class="bg-image"></div>
      <div class="main-content">
          <div class="container">
              <div class="about-us">                        
                  <div class="content-inner">                            
                      <div class="our-team">

                                                  
                          <div class="row"> 
                              <div class="button_nova_partida">
                                  <a href="cadastro_pergunta.php"><button type="button" class="btn btn-success"><spam class="glyphicon glyphicon-calendar"></spam>NOVA PERGUNTA</button></a>
                              </div>
                            

                              <?php
                                $perguntas = $db->query("SELECT * from pergunta order by id desc");
                                    if(mysqli_affected_rows($db) > 0){
                                       while ($pergunta = $perguntas->fetch_assoc()){
                              ?>    
                                       
                                      <div class="col-md-12">
                                          <div class="col-margin">
                                            
                                              <div class="team-member">
                                                  <div class="member-infos">
                                                    <h5 class="member-name"><?php echo $pergunta['pergunta']; ?></h5>
                                                    
                                                    <ul class="member-social">
                                                        <li><a href="editar_pergunta.php?id=<?=$pergunta['id']?>"><span class="glyphicon glyphicon-pencil"></span></a></li>
                                                        <li><a href="termo_excluir_pergunta.php?id=<?=$pergunta['id']?>"><span class="glyphicon glyphicon-trash"></span></a></li>
                                                        <li><a href="resultado.php?id_pergunta=<?=$pergunta['id']?>"><span class="glyphicon glyphicon-map-marker"></span></a></li>
                                                    </ul>
                                                    </ul>

                                                  </div><!-- /.member-infos --> 
                                              </div><!-- /.team-member -->
                                              
                                          </div><!-- /.col-margin -->  
                                      </div> <!-- /.col-xs-12 --> 
                                                      
                              <?php         
                                        }
                                      $perguntas->free(); 
                                  }
                                  else{
                                      echo "<h4 class='sem_registros'>NÂO HA PERGUNTAS REGISTRADAS!</h4>";
                                  }
                                  
                              ?>

                          </div><!-- /.row -->    
                      </div> <!-- /.our-team -->
                  </div> <!-- /.content-inner -->          
              </div> <!-- /.about-us -->   
              
          </div><!-- /.container--> 
      </div><!-- /.main-content-->

      <script src="../../../js/jquery-1.10.2.min.js"></script>
      <script src="../../../bootstrap-3.7/js/bootstrap.min.js"></script>
 
</body>
    <?mysqli_close($db);?>
</html>