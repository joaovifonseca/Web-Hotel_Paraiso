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

$result = $con->query("SELECT * FROM aluga WHERE ID_USU_ALUGA = '" . $_GET['id_usu'] . "'"); 

# variável para armazenar o conjunto de dados que será convertido no formato JSON 
$json = array(); 
 
header('Content-Type: application/json');
# percorre todos os registros retornados e armazena na variável $json 
while ($row = mysqli_fetch_assoc($result)) {  
    $json[] = $row;
}

echo json_encode($json, JSON_PRETTY_PRINT);
mysqli_close($con);