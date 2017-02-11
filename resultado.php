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
          $id_user = $_GET['id_user'];
          $id_pergunta =$_GET['id_pergunta'];
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
          height: 300px;
          margin-bottom: 20px;
          margin-top: 20px;
         
      }
      #idDiv{
        display: none;
      }
    </style>      

</head>

<body>
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
       <!--<div class="bg-image"></div>-->

       <?php
          $result= $db->query("SELECT count(resposta) as totalSim from respostas_usuarios where resposta = 'sim' and id_pergunta = '$id_pergunta' ");
          $totalSim = $result->fetch_assoc();
          echo "totalSim ".$totalSim['totalSim'];

          $result= $db->query("SELECT count(resposta) as totalNao from respostas_usuarios where resposta = 'nao' and id_pergunta = '$id_pergunta' ");
          $totalNao = $result->fetch_assoc();
          echo "totalNao ".$totalNao['totalNao'];

          $result= $db->query("SELECT count(resposta) as totalNaoSei from respostas_usuarios where resposta = 'naoSei' and id_pergunta = '$id_pergunta' ");
          $totalNaoSei = $result->fetch_assoc();
          echo "totalNaoSei ".$totalNaoSei['totalNaoSei'];

          $somaVotos = $totalSim['totalSim'] + $totalNao['totalNao'] + $totalNaoSei['totalNaoSei'];
          echo "soma votos ".$somaVotos;
          $totalSim = (($totalSim['totalSim'] * 100) / $somaVotos);
          $totalNao = (($totalNao['totalNao'] * 100) / $somaVotos);
          $totalNaoSei = (($totalNaoSei['totalNaoSei'] * 100) / $somaVotos);

          /*====================================================================== Nome da pergunta ======================================================*/
          $perguntas = $db->query("SELECT * from pergunta where id = '$id_pergunta'");
            while ($pergunta = $perguntas->fetch_assoc()){
                $enquete = $pergunta['pergunta'];
            }
            $perguntas->free();

            /*====================================================================== Resposta Usuario ======================================================*/
          $respostas = $db->query("SELECT * from respostas_usuarios where id_usuario = '$id_user' and id_pergunta = '$id_pergunta'");
            while ($resposta= $respostas->fetch_assoc()){
                $voto = $resposta['resposta'];
            }
            $respostas->free();


                                        
       ?>

       <div class="main-content">
          <div class="container">
            <div class="row">
              <div class="col-md-12 col-sm-12">

                  <form action="" method="post">
                      <div class="login-form">

                       <div class="row resultado">
                            <div class="col-md-12 title">
                                 <h4><?php echo $enquete." (você: ".$voto.")";?></h4>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                 <div class="resultados">
                                    <label>sim <?php echo $totalSim;?> % </label>
                                    <label>não <?php echo $totalNao;?> %</label>
                                    <label>não sei <?php echo $totalNaoSei;?> %</label>
                                 </div>
                            </div>
                       </div>

                      

                       <div class="row filtros">

                           <div class="col-md-12 title">
                               <h3>FILTROS</h3>
                           </div>


                           <div class="col-md-6 col-sm-6">

                              <div class="row">
                                  <div class="col-md-12">
                                     <h4>respostas</h4>
                                  </div>
                              </div>

                              <div class="resposta">
                                 <label>sim<label>
                                 <input type="checkbox" name="sim">
                              </div>

                              <div class="resposta">
                                 <label>não<label>
                                 <input type="checkbox" name="nao">
                              </div>

                              <div class="resposta">
                                 <label>não sei<label>
                                 <input type="checkbox" name="nao_sei">
                              </div>
                           </div><!--/.col-md-6-->


                           <div class="col-md-6 col-sm-6">

                              <div class="row">
                                  <div class="col-md-12">
                                     <h4>escolaridade</h4>
                                  </div>
                              </div>

                              <div class="resposta">
                                 <label>ensino fundamental<label>
                                 <input type="checkbox" name="sim">
                              </div>

                              <div class="resposta">
                                 <label>ensino medio<label>
                                 <input type="checkbox" name="nao">
                              </div>

                              <div class="resposta">
                                 <label>ensino superior<label>
                                 <input type="checkbox" name="nao_sei">
                              </div>
                           </div><!--/.col-md-6-->


                       </div><!--/.row-->

                       <div class="row mapa">

                           <div class="col-md-12 title">
                               <h3>MAPA</h3>
                           </div>

                           <div class="col-md-12 col-sm-12">

                               <div id="map"></div>

                               <?php
                                  $cont =0;
                                  $usuarios = $db->query("SELECT id_usuario from respostas_usuarios where id_pergunta = '$id_pergunta' ");
                                    while ($usuario= $usuarios->fetch_assoc()){
                                        $id_usuario_atual = $usuario['id_usuario'];


                                          $localizacoes = $db->query("SELECT lat, lng from usuario where id = '$id_usuario_atual' ");
                                          while ($localizacao= $localizacoes->fetch_assoc()){
                                              $lat_atual = $localizacao['lat'];
                                              $lng_atual = $localizacao['lng'];
                  
                                              $array[$cont]["lat"]= $lat_atual;
                                              $array[$cont]["lng"]= $lng_atual;
                                              $cont++;
                                              
                                          }
                                          $localizacoes->free();                                  
                                    
                                        
                                    }
                                    $usuarios->free(); 
                                    $dadosTratados = json_encode($array);                                 
                               ?>
                          
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
              zoom: 4,
             center:{lat: -6.889797, lng: -38.561197},
            });

            map.addListener('click', function(e) {
              placeMarkerAndPanTo(e.latLng, map);
            });

            var dadosTratados = JSON.parse($('#idDiv').html());
            //para ver os dados e testar se deu certo use o console.log:
            
            for (var key in dadosTratados) {
                placeMarkerAndPanTo({lat: parseFloat(dadosTratados[key]['lat']), lng: parseFloat(dadosTratados[key]['lng'])}, map); 
            }
          }

          function placeMarkerAndPanTo(latLng, map) {
            var marker = new google.maps.Marker({
              position: latLng,
              map: map
            });
            $("#latLng").val(latLng);
            map.panTo(latLng);
          }

          $("#botaoLocalizacao").click(function(){
              $("#map").show();
          });

    </script>


    <script>
    $(document).ready(function(){



    });

</script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6uep-fiBCnkiN69txzM-3UxT7rBfMnN8&callback=initMap"
        async defer>
    </script>


         
         
</body>
    
</html>
