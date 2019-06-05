<?php 
 
ini_set('display_errors',1); 
ini_set('display_startup_erros',1); 
error_reporting(E_ALL); 
 
 
# dados para conexão no banco de dados 
$host = "fdb20.awardspace.net"; 
$db_name = "3058018_hotelparaiso"; 
$username = "3058018_hotelparaiso"; 
$password = "paraiso123"; 
 
# realiza a conexão no banco de dados 
$con = new mysqli("$host", "$username", "$password", "$db_name"); 
 
# variável para armazenar o resultado da consulta no banco de dados 
$result = $con->query("SELECT * FROM usuario WHERE email_usu = '" . $_GET['email_usu'] . "' AND senha_usu = '" . $_GET['senha_usu'] . "'"); 

# variável para armazenar o conjunto de dados que será convertido no formato JSON 
$json = array(); 
 
$row = mysqli_fetch_assoc($result);
# percorre todos os registros retornados e armazena na variável $json      
$json[] = $row; 

# fecha a conexão com o banco antes de enviar a resposta ao cliente  
mysqli_close($con); 
 
# envia a resposta ao cliente (solicitante) 
$resultado = json_encode($json[0], JSON_PRETTY_PRINT);
header('Content-Type: application/json');
echo $resultado;