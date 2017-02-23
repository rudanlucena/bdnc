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

          /* dados passados pelo metodo get */
          $id_user = $_SESSION['id_user'];
          $id_pergunta =$_GET['id_pergunta'];

          $sim = isset($_POST['sim']);
          $nao = isset($_POST['nao']);
          $naoSei = isset($_POST['naoSei']);
          $fundamental = isset($_POST['fundamental']);
          $medio= isset($_POST['medio']);
          $superior = isset($_POST['superior']);

          include("conexao.php");
    ?>
    <meta charset="UTF-8">
    <title>resultado</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap-3.7/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen"> 
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/templatemo_style.css">
    <script src="js/jquery-1.10.2.min.js"></script>

      <style>
        #map {
          width: 100%;
          height: 100%;
          margin-bottom: 20px;
          margin-top: 20px;
         
      }
      #idDiv{
        display: none;
      }
      .invisivel{
        display: none;
      }
      .button_filtro{
        text-align: center;
        margin-top: 30px;
      }
      .login-form{
        width: 100%;
      }
      .sucsses{
        text-align: center;
      }
      .fail{
        text-align: center;
        color: red;
      }
    </style>      

</head>
<body>
      <!-- bloco que verifica se p usuario ja votol nessa enquete -->
      <?php
          $respostas_usuariosx = $db->query("SELECT * from respostas_usuarios WHERE id_usuario = '$id_user' AND id_pergunta = '$id_pergunta'");
            if(mysqli_affected_rows($db) == 0){
              Header("location:verifica_voto.php?id_pergunta=$id_pergunta"); 
          }
  
      ?>

      <div class="bg-image"></div>
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
      
      <?php
        include("respostas_enquete.php"); 
      ?>

       <div class="main-content">
          <div class="container">
            <div class="row">
              <div class="col-md-12 col-sm-12">

                  <form action="" method="post" id="ajax_form">
                      <div class="login-form">

                       <div class="row resultado">
                            <div class="col-md-6">
                                   <div class="col-md-12 title">
                                       <h3><?php echo $enquete." (você: ".$voto.")";?></h3>
                                   </div>
                                   <div class="resultados">
                                      <label><span class="glyphicon"><img src="images/sim.png"></span>Sim: <?php echo $totalSim['totalSim']; echo " (".number_format($totalSimPorcentagem,1)."%)";?></label>
                                      <label><span class="glyphicon"><img src="images/nao.png"></span>Não: <?php echo $totalNao['totalNao']; echo " (".number_format($totalNaoPorcentagem,1)."%)";?></label>
                                      <label><span class="glyphicon"><img src="images/naoSei.png"></span>Não sei: <?php echo $totalNaoSei['totalNaoSei']; echo " (".number_format($totalNaoSeiPorcentagem,1)."%)";?></label>
                                   </div>
                            </div>
                       

                      
                            <div class="col-md-6">
                                <div class="col-md-12 title">
                                   <h3>FILTROS</h3>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="invisivel">
                                       <input type="text" name="id_user" value='<?=$id_user?>' >
                                       <input type="text" name="id_pergunta" value='<?=$id_pergunta?>' >
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                           <h4>Respostas</h4>
                                        </div>
                                    </div>

                                    <div class="resposta">
                                       <label>Sim<label>
                                       <input type="checkbox" name="sim" <?php if($sim){?>checked<?php } ?> >
                                    </div>

                                    <div class="resposta">
                                       <label>Não<label>
                                       <input type="checkbox" name="nao" <?php if($nao){?>checked<?php } ?> >
                                    </div>

                                    <div class="resposta">
                                       <label>Não sei<label>
                                       <input type="checkbox" name="naoSei" <?php if($naoSei){?>checked<?php } ?> >
                                    </div>
                                </div><!--/.col-md-6-->
                            

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                           <h4>Escolaridade</h4>
                                        </div>
                                    </div>

                                    <div class="resposta">
                                       <label>Ensino fundamental<label>
                                       <input type="checkbox" name="fundamental" <?php if($fundamental){?>checked<?php } ?>>
                                    </div>

                                    <div class="resposta">
                                       <label>Ensino medio<label>
                                       <input type="checkbox" name="medio" <?php if($medio){?>checked<?php } ?> >
                                    </div>

                                    <div class="resposta">
                                       <label>Ensino superior<label>
                                       <input type="checkbox" name="superior" <?php if($superior){?>checked<?php } ?>>
                                    </div>                                   
                                </div><!--/.col-md-6-->

                                
                                <div class="col-md-12">
                                  <div class="button_filtro">
                                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span>Filtrar</button>
                                  </div>
                                </div>
                                 
                                
                              </div>
                       </div><!--/.row-->

            
                       <div class="row mapa">

                           <div class="col-md-12 title">
                               <h3>MAPA</h3>
                           </div>

                           <div class="col-md-12 col-sm-12">

                              <?php
                                include("filtro.php");
                              ?>

                              <div id="map"></div>
                           </div><!--/.col-md-6-->

                           <div id="idDiv"><?php echo $dadosTratados;?></div> 

                       </div><!--/.row-->
                     </div><!--/.login-form-->
                  </form>
             </div><!--/.col-md-12-->
           </div><!--/.row-->       
        </div><!--/.container-->
    </div><!--/.main-content-->

    <script>
          function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 8,
             center:{lat: -6.889797, lng: -38.561197},
            });

            var dadosTratados = JSON.parse($('#idDiv').html());
            //para ver os dados e testar se deu certo use o console.log:
            
            for (var key in dadosTratados) {
              if(dadosTratados[key]['resposta'] == "nao"){
                  placeMarkerAndPanToNao({lat: parseFloat(dadosTratados[key]['lat']), lng: parseFloat(dadosTratados[key]['lng'])}, map); 
              }
              else if(dadosTratados[key]['resposta'] == "sim"){
                  placeMarkerAndPanToSim({lat: parseFloat(dadosTratados[key]['lat']), lng: parseFloat(dadosTratados[key]['lng'])}, map); 
              }else if(dadosTratados[key]['resposta'] == "naosei"){
                  placeMarkerAndPanToNaoSei({lat: parseFloat(dadosTratados[key]['lat']), lng: parseFloat(dadosTratados[key]['lng'])}, map); 
              }
            }
          }

          function placeMarkerAndPanToNao(latLng, map) {
            var marker = new google.maps.Marker({
              position: latLng,
              map: map,
              icon: 'images/nao.png'
            });
            map.panTo(latLng);
          }

          function placeMarkerAndPanToSim(latLng, map) {
            var marker = new google.maps.Marker({
              position: latLng,
              map: map,
              icon: 'images/sim.png'
            });
            map.panTo(latLng);
          }

          function placeMarkerAndPanToNaoSei(latLng, map) {
            var marker = new google.maps.Marker({
              position: latLng,
              map: map,
              icon: 'images/naoSei.png'
            });
            map.panTo(latLng);
          }

          $("#botaoLocalizacao").click(function(){
              $("#map").show();
          });

    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6uep-fiBCnkiN69txzM-3UxT7rBfMnN8&callback=initMap"
        async defer>
    </script>
    
</body>
</html>
