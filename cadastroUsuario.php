<?php
    session_start(); 
    //Incluindo a conexão com banco de dados   
    include_once("conexao.php");  

    $action = $_POST['cadastro'];
    if($action == "cadastro") {
        $nome = $_POST['nome'];
        $sexo = $_POST['sexo'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $celular= $_POST['celular'];
        $endereco = $_POST['endereco'];
        $cidade= $_POST['cidade'];
    
        //Inseridas informações no banco de dados
        $sql = "INSERT INTO usuario (CPF_USU,NOME_USU,SENHA_USU,SEXO_USU,TIPO_USU,TELEFONE_USU,CELULAR_USU,ENDERECO_USU,CIDADE_USU,EMAIL_USU)VALUES('$cpf','$nome','$senha','$sexo','U','$telefone','$celular','$endereco','$cidade','$email')";
        
        if ($conn->query($sql) === TRUE) {
            $_SESSION['textoSucesso'] = "Usuario incluido com sucesso";
        header("location: sucesso.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        //$conn->query("INSERT INTO usuario (CPF_USU,NOME_USU,SENHA_USU,SEXO_USU,TIPO_USU,TELEFONE_USU,CELULAR_USU,ENDERECO_USU,CIDADE_USU,EMAIL_USU)VALUES('$cpf','$nome','$senha','$sexo','U','$telefone','$celular','$endereco','$cidade','$email')");
        //$result_usuarios = "INSERT INTO usuario (CPF_USU,NOME_USU,SENHA_USU,SEXO_USU,TIPO_USU,TELEFONE_USU,CELULAR_USU,ENDERECO_USU,CIDADE_USU,EMAIL_USU)VALUES('$cpf','$nome','$senha','$sexo','U','$telefone','$celular','$endereco','$cidade','$email')";
        //$resultado_usuario = mysqli_query($conn, $result_usuario);
        
        //$result = mysql_query($result_usuarios, $connection) or die(mysql_error());

        //Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
        $_SESSION['textoSucesso'] = "Usuario incluido com sucesso";
        header("location: sucesso.php");
        //Declarada sessão para guardar a mensagem e o tipo dela
    } else {
        header("location: cadastroUsuario.html");
    }
    $conn->close();
?>