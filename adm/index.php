<html>
  <head>
    <meta charset="UTF-8">
    <title>LOGIN</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap-3.7/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="../css/templatemo_style.css" rel="stylesheet" media="screen"> 
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
       <div class="bg-image"></div>
       <div class="main-content">
          <div class="container">
            <div class="row">
              <div class="col-md-12 col-sm-12">
  
                  <form action="validar_adm.php" method="post">
                      <div class="login-form">

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
                           <button type="submit" class="log-btn">LOGIN<span class="glyphicon glyphicon-chevron-right"></span></button>               
                         </div>

                         <div class="form-group ">
                           <a href="../index.php"><spam class="glyphicon glyphicon-user"></spam></a>
                         </div>
                         
                     </div>
                  </form>

                

             </div><!--/.col-md-12-->
           </div><!--/.row-->       
        </div><!--/.container-->
    </div><!--/.main-content-->
         
         
</body>
    
</html>
