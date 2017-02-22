<html>
  <head>
    <meta charset="UTF-8">
    <title>LOGIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap-3.7/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="css/templatemo_style.css" rel="stylesheet" media="screen"> 
    <link rel="stylesheet" href="css/style.css">

    <style>
      .form-group a{
        color: white;
        margin-left: 10px;
        text-decoration: underline;
      }
    </style>

</head>
<body>
       <div class="bg-image"></div>
       <div class="main-content">
          <div class="container">
            <div class="row">
              <div class="col-md-12 col-sm-12">
  
                  <form action="validar_user.php" method="post">
                      <div class="login-form">
                         <div class="link">
                             <a href="adm/index.php" class="loginAdm"><spam class="glyphicon glyphicon-text-background"></spam></a>
                         </div>

                         <div class="templatemo_logo">        
                             <!--<img class="logo_arena" src="images/icone-chat.png">-->
                         </div> <!-- /.logo -->
                         <div class="form-group log-status">
                           <input type="email" class="form-control" placeholder="Email" id="UserName" name="email" required>
                         </div>

                         <div class="form-group log-status">
                           <input type="password" class="form-control" placeholder="Senha" id="Passwod" name="senha" required>
                         </div>

                         <div class="form-group log-status">
                           <button type="submit" class="log-btn" >LOGIN<span class="glyphicon glyphicon-chevron-right"></span></button>               
                         </div>

                         <div class="form-group">
                            <div class="foolter">
                             <a href="cadastro_usuario.php">criar conta.</a>
                           </div>
                       </div>
                     </div>
                  </form>
             </div><!--/.col-md-12-->
           </div><!--/.row-->       
        </div><!--/.container-->
    </div><!--/.main-content-->
         
</body>
</html>
