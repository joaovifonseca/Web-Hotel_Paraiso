<?php
    $servidor = "fdb20.awardspace.net";
    $usuario = "3058018_hotelparaiso";
    $senha = "paraiso123";
    $dbname = "3058018_hotelparaiso";    
    //Criar a conexao
    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
    if(!$conn){
        die("Falha na conexao: " . mysqli_connect_error());
    }else{
        //echo "Conexao realizada com sucesso";
    }      
?>