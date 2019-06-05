<?php
//Sessão realizada para gerar as mensagens de sucesso
session_start();
//Declarando as variasveis sem valor para atribuir aos campos antes de clicar em ALTERAR
include_once("conexao.php");  

//Realizado o cadastro do quarto
if(isset($_POST['cadastrar']))//Caso nome do Botão seja 'Cadastrar'
	{
			//Requisitadas informações da tela de inserção
			
			$numero_quarto = $_POST['nquarto'];
			$capacidade_quarto = $_POST['cquarto'];
			$tipo_quarto = $_POST['tquarto'];
			$qtdcama_quarto = $_POST['qcamas'];
	
			$sql = "INSERT INTO quarto (NUM_QRT,CAPACIDADE_QRT,TIPO_QRT,QTDCAMA_QRT)VALUES('$numero_quarto','$capacidade_quarto','$tipo_quarto','$qtdcama_quarto')";
			//Inseridas informações no banco de dados
			if ($conn->query($sql) === TRUE) {
                                
				$_SESSION['textoSucesso'] = "Quarto cadastrado com sucesso";
				header("location: sucesso.php");
			} else {
				$_SESSION['textoErro'] = "Erro ao cadastrar quarto, '$conn->error'";
				header("location: erro.php");
			}
			
	}



//Realizada exclusão do quarto
if(isset($_GET['deletar']))//Caso nome do Botão seja 'deletar'
	{
		//Requisitadas informações da tela de inserção
		$id = $_REQUEST['deletar'];	
                $sqlVerificar = $conn->query("SELECT ID_QRT FROM quarto JOIN aluga ON ID_QRT = ID_QRT_ALUGA WHERE ID_QRT_ALUGA = '$id'") or die ($conn->error);
                
                //$result = $conn->query($sqlVerificar);
                
                if ($sqlVerificar == TRUE) {
                        /*$row = $sqlVerificar->fetch_assoc();
                                if($row !== 0) {*/
                                $sql = "DELETE FROM quarto WHERE ID_QRT = $id";
                                if ($conn->query($sql) === TRUE) {
                                        $_SESSION['textoSucesso'] = "Quarto deletado com sucesso";
                                        header("location: sucesso.php");
                                } else {
                                        $_SESSION['textoErro'] = "Existem reservas para este quarto";
                                        header("location: erro.php");
                                //}
                        }
				
			} else {
				$_SESSION['textoErro'] = "Erro ao deletar quarto";
				header("location: erro.php");
			}
                
		//Deletadas informações no banco de dados
		
	}
//Realizada alteração do quarto
if(isset($_POST['update']))
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
    
    header("location: funcionario.php");    
}
	
 ?>
