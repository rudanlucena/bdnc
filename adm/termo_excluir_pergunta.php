<html>
<head>

    <?php 
          session_start();
          if((!isset ($_SESSION['login_adm']) == true) and (!isset ($_SESSION['senha_adm']) == true))
          {
            unset($_SESSION['login_adm']);
            unset($_SESSION['senha_adm']);
            header('location:index.php');
          }

          $logado = $_SESSION['login_adm'];  
          $id = $_GET['id'];
    ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  <link href="../bootstrap-3.7/css/bootstrap.css" rel="stylesheet" media="screen">
  <link href="../css/templatemo_style.css" rel="stylesheet" media="screen">

  <style>
    .termo{
      background-color: rgba(0, 0, 0, 0.4);
      padding: 20px;
    }
    .termo .continuar{
      background-color: green;
      color: white;
    }
    .termo .cancelar{
      color: black;
      background-color: red;
    }
  </style>
  
</head>
<body> 
    <div class="bg-image"></div>
    <div class="main-content">
        <div class="container">
            <div class="row">
               <div id="termo_excluir_clube">
                    <div class="col-md-12">
                        <div class="termo"> 
                            você realmente dejesa excluir a pergunta?
                            <div class="acao">
                              <a href="listar_perguntas.php"><button type="button" class="btn cancelar">não</button></a>
                              <a href="excluir_pergunta.php?id=<?=$id?>"><button type="button" class="btn continuar">sim</button>
                            </div>                                                             
                        </div><!-- /.termo-->                           
                    </div><!-- /.col-md-12-->
                </div> <!-- /#termo_excluir_clube-->
            </div><!--/.row-->
        </div><!--/.container-->
    </div><!--/.main-content-->

</body>
</html>
    
    



