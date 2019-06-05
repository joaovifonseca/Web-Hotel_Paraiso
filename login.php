<?php
    session_start(); 
    //Incluindo a conexão com banco de dados   
    include_once("conexao.php");    
    $action =  $_POST['action'];
    if($action == "logar") {
        //O campo usuário e senha preenchido entra no if para validar
        if((isset($_POST['email'])) && (isset($_POST['senha']))){
            $usuario = $_POST['email']; 
            $senha =  $_POST['senha'];

            
            //Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
            $result_usuario = "SELECT * FROM usuario WHERE EMAIL_USU = '$usuario' && SENHA_USU = '$senha' ";
            $resultado_usuario = mysqli_query($conn, $result_usuario);
            $resultado = mysqli_fetch_assoc($resultado_usuario);
            
            //Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
            if(isset($resultado)){
                $_SESSION['usuarioId'] = $resultado['ID_USU'];
                $_SESSION['usuarioCPF'] = $resultado['CPF_USU'];
                $_SESSION['usuarioNome'] = $resultado['NOME_USU'];
                $_SESSION['usuarioTipoUsu'] = $resultado['TIPO_USU'];
                $_SESSION['usuarioEmail'] = $resultado['EMAIL_USU'];
                $_SESSION['usuarioSenha'] = $resultado['SENHA_USU'];
                if($_SESSION['usuarioTipoUsu'] == "F"){
                    header("Location: funcionario.php");
                }else if ($_SESSION['usuarioTipoUsu'] == "U"){
                    header("Location: cliente.php");
                } else {
                    $_SESSION['textoErro'] = "Não foi possível efetuar o login";
                    header("Location: erro.php");
                }

            //Não foi encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
            //redireciona o usuario para a página de login
            }else{    
                //Váriavel global recebendo a mensagem de erro
                $_SESSION['textoErro'] = "Usuário ou senha Inválido";
                header("Location: erro.php");
            }
        //O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login
        }else{
            $_SESSION['textoErro'] = "Usuário ou senha inválido";
            header("Location: erro.php");
        }
    } else {
        header("Location: cadastroUsuario.html");
    }

    $conn->close();
?>