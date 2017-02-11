<?php

    error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
    // obtém a conexão com o banco MySQL
    
    $conexao = mysqli_connect("localhost", "root", "") or print (mysql_error());  
  
      $sql = "CREATE DATABASE if not exists bdnc";
   
        // Executa o comando SQL
        $result = mysqli_query($conexao, $sql);
  
        // Verifica se o comando foi executado com sucesso
        if(!$result)
            die("Falha na criacao do banco: " . mysqli_error());
        else{
                mysqli_select_db($conexao, "bdnc") or print(mysqli_error()); 

                
                $sql = "CREATE TABLE if not exists usuario(
                    id int primary key auto_increment,
                    sexo varchar(1) not null,
                    idade varchar(5) not null,
                    renda varchar(2) not null,
                    escolaridade varchar(50) not null,
                    lat varchar(300) not null,
                    lng varchar(300) not null,
                    email varchar(150) not null,
                    senha varchar(25) not null
                )";
      
                // Executa o comando SQL
                $result = mysqli_query( $conexao,$sql);
      
                // Verifica se o comando foi executado com sucesso
                if(!$result)
                    die("Falha na tabela usuario: " . mysqli_error());
            //====================================================


                $sql = "CREATE TABLE if not exists pergunta(
                    id int primary key auto_increment,
                    pergunta varchar(300) not null unique
                )";
      
                // Executa o comando SQL
                $result = mysqli_query( $conexao,$sql);
      
                // Verifica se o comando foi executado com sucesso
                if(!$result)
                    die("Falha na tabela pergunta: " . mysqli_error());
            //====================================================


                $sql = "CREATE TABLE if not exists login(
                    id int primary key auto_increment,
                    email varchar(150) not null unique,
                    senha varchar(25) not null 
                )";
      
                // Executa o comando SQL
                $result = mysqli_query( $conexao,$sql);
      
                // Verifica se o comando foi executado com sucesso
                if(!$result)
                    die("Falha na tabela login: " . mysqli_error());
            //====================================================

                $sql = "CREATE TABLE if not exists respostas_usuarios(
                    id_usuario int, 
                    id_pergunta int,
                    resposta varchar(7) not null,
                    primary key(id_usuario, id_pergunta),
                    FOREIGN KEY(id_usuario) REFERENCES usuario(id) ON DELETE CASCADE ON UPDATE CASCADE,
                    FOREIGN KEY(id_pergunta) REFERENCES pergunta(id) ON DELETE CASCADE ON UPDATE CASCADE 
                )";
      
                // Executa o comando SQL
                $result = mysqli_query( $conexao,$sql);
      
                // Verifica se o comando foi executado com sucesso
                if(!$result)
                    die("Falha na tabela respostas_usuario: " . mysqli_error());
            //====================================================
  
    }
  // fecha a conexão
  mysqli_close($conexao); 
?>



