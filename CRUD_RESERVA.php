<?php
session_start(); 
include_once("conexao.php");  
$action =  $_POST['action'];
//Realizado o cadastro do quarto
$id_usu_aluga = $_SESSION['usuarioNome'];
if($action == "reservar")
{
		if($id_usu_aluga != "") {
			//Requisitadas informações da tela de inserção
			$id_usu_aluga = $_POST['idusuario'];
			$id_qrt_aluga = $_POST['idquarto'];
			$dt_entrada = $_POST['dtentrada'];
			$dt_saida = $_POST['dtsaida'];
			$sql = "INSERT INTO aluga (ID_USU_ALUGA,ID_QRT_ALUGA,DT_ENTRADA,DT_SAIDA)VALUES('$id_usu_aluga','$id_qrt_aluga', '$dt_entrada','$dt_saida')";

			if ($conn->query($sql) === TRUE) {
				$_SESSION['textoSucesso'] = "Reserva efetuada sucesso";
				header("location: sucesso.php");
			} else {
				$_SESSION['textoErro'] = "Erro ao efetuar reserva, '$conn->error'";
				header("location: erro.php");
			}
		} else {
			header("location: login.html");
		}
}

if($action == "deletar")
	{
		//Requisitadas informações da tela de inserção
		$id = $_POST['idaluga'];
		$sql = "DELETE FROM aluga WHERE ID_ALUGA = $id";
		//Deletadas informações no banco de dados
		if ($conn->query($sql) === TRUE) {
				$_SESSION['textoSucesso'] = "Reserva efetuada sucesso";
				header("location: sucesso.php");
			} else {
				$_SESSION['textoErro'] = "Erro ao efetuar reserva, '$conn->error'";
				header("location: erro.php");
			}
        
        header("location: cliente.php");
	}
if($action == "update")
{
    $id = $_POST['idquarto'];
	$numero_quarto = $_POST['nquarto'];
	$capacidade_quarto = $_POST['cquarto'];
	$tipo_quarto = $_POST['tquarto'];
	$qtdcama_quarto = $_POST['qcamas'];
    
    //Alteradas informações no banco de dados
		$conn->query("UPDATE quarto SET NUM_QRT = '$numero_quarto', CAPACIDADE_QRT = '$capacidade_quarto', TIPO_QRT = '$tipo_quarto', QTDCAMA_QRT = '$qtdcama_quarto'  WHERE ID_QRT = '$id'")
		or die ($conn->error());
    
    $_SESSION['mensagem'] = "Usuario Alterado com sucesso";
    $_SESSION['msg_tipo'] = "warning";
    
    header("location: consultaQuarto.php");    
}
	
 ?>
