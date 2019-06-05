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
			<li><a href="./reservas.php">Reservar</a></li>
			<li><a href="./contato.html">Contato</a></li>
            <li>Olá, <?php echo $_SESSION['usuarioNome']?></a></li>
		</nav>
	</header>

	<div class="container container-consulta-quarto">
<?php
        require_once 'conexao.php';
        $result = $conn->query("SELECT * FROM aluga JOIN quarto ON ID_QRT_ALUGA = ID_QRT WHERE ID_USU_ALUGA = $id") or die ($conn->error);
        ?>
        <div class = 'row justify-content-center'>
            <table class='table'>
                <thead>
                    <tr>
                        <th>Numero do Quarto</th>
                        <th>Quantidade de Camas</th>
                        <th>Capacidade do Quarto</th>
						<th>Tipo do Quarto</th>
						<th>Data de Entrada</th>
						<th>Data de Saída</th>
                        <th colspan="1">Ações de Controle</th>
                    </tr>
                </thead>
                <?php
                    while ($row = $result->fetch_assoc()): ?>
                        <form action="CRUD_RESERVA.php" method="POST">
						<input type="hidden" name="idaluga" value="<?php echo $row['ID_ALUGA'];?>"> 
						<tr>
                            <td><?php echo $row['NUM_QRT']; ?></td>
							<td><?php echo $row['QTDCAMA_QRT']; ?></td>
                            <td><?php echo $row['CAPACIDADE_QRT']; ?></td>
                            <td><?php echo $row['TIPO_QRT']; ?></td>
							<td><?php echo date("d/m/Y", strtotime($row['DT_ENTRADA'])); ?></td>
							<td><?php echo date("d/m/Y", strtotime($row['DT_SAIDA'])); ?></td>
                            <td>
							<button class="btn btn-danger width-full" class="form-control" style="color: #ffffff" value="deletar" name="action">Deletar</button><br>	
                            </td>
                        </tr>  
						</form>                         
                <?php endwhile; ?>
            </table>
		</div>
</div>

<div class="container">
            <div style="height: 120px"></div>
        </div>

        <footer style="width:100%; line-height: 0px;bottom: 0;position: fixed;">
                <p>Todos os direitos reservados - Hotel Paraíso 2019
        </footer>
		
</body>
</html>