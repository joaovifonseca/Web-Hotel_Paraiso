<html>
<head>
        <title>Hotel Paraíso</title>
        <meta charset="UTF-8">
        <!--Importando bibliotecas externas-->
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
<body>
<?php
    session_start();
    require_once 'conexao.php';
	$id = $_SESSION['usuarioId'];  
	if($_SESSION['usuarioNome'] == null) {
		header("Location: login.html");
	}
?>
<header>
		<a href="#"><img src="img/logo.png" alt="Hotel Paraíso"></a>
		<nav>
			<li><a href="./index.html">Home</a></li>
			<li><a href="./cadastroQuarto.php">Cadastro de Quarto</a></li>
			<li><a href="./contato.html">Contato</a></li>
            <li>Olá, <?php echo $_SESSION['usuarioNome']?></a></li>
		</nav>
    </header>
    
    <form method="POST" action="cadastroQuarto.php">
        <?php require_once 'conexao.php';?>
        <div class="container container-consulta-quarto">
        
        <?php
        $result = $conn->query("SELECT * FROM quarto") or die ($conn->error);
        ?>
        <div class = 'row justify-content-center'>
            <table class='table'>
                <thead>
                    <tr>
                        <th>Numero do Quarto</th>
                        <th>Quantidade de Camas</th>
                        <th>Capacidade do Quarto</th>
                        <th>Tipo do Quarto</th>                     
                        <th colspan="2">Ações de Controle</th>
                    </tr>
                </thead>
                <?php
                    while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['NUM_QRT']; ?></td>
                            <td><?php echo $row['CAPACIDADE_QRT']; ?></td>
                            <td><?php echo $row['QTDCAMA_QRT']; ?></td>
                            <td><?php echo $row['TIPO_QRT']; ?></td>
                            <td>
                                <a href="cadastroQuarto.php?alterar=<?php echo $row['ID_QRT']; ?>"
                                   class="btn btn-info">Alterar</a>
                                <a href="CRUD_QUARTO.php?deletar=<?php echo $row['ID_QRT']; ?>"
                                   class="btn btn-danger">Deletar</a>
                            </td>
                        </tr>                           
                <?php endwhile; ?>
            </table>
        </div>
        <?php
            function pre_r( $array )
            {
                echo '<pre>';
                print_r($array);
                echo '</pre>';
            }   
        ?>
                    <div class="container-botoes">
                        <div class="col-sm-12">
                            <button class="btn btn-success width-full" style="margin: 30px 0 0 0px;color: #ffffff">Cadastrar Quarto</button><br>	
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
            <div style="height: 90px"></div>
        </div>

        <footer style="width:100%; line-height: 0px;bottom: 0;margin-top: 80px;">
                <p>Todos os direitos reservados - Hotel Paraíso 2019
        </footer>
		</form>

</body>
</html>