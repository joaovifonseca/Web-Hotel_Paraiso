<!DOCTYPE html>
<html>
    <head>
        <title>Hotel Paraíso</title>
        <meta charset="UTF-8">
        <!--Importando bibliotecas externas-->
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">	<meta charset="utf-8">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    </head>
    <body>
	<?php
    session_start();
	require_once 'conexao.php';    
	?>
        <header>
            <a href="#"><img src="img/logo.png" alt="Hotel Paraíso"></a>
			<nav>
                <li><a href="./index.html">Home</a></li>
                <li><a href="./reservas.php">Reservas</a></li>
                <li><a href="./Contato.html">Contato</a></li>
            </nav>
		</header>
		<div class="container container-consulta-quarto">
<?php
        $result = $conn->query("SELECT * FROM quarto") or die ($conn->error);
        ?>
        <div class = 'row justify-content-center'>
            <table class='table'>
                <thead>
                    <tr>
                        <th>Numero do Quarto</th>
                        <th>Capacidade do Quarto</th>
                        <th>Quantidade de Camas</th>
						<th>Tipo do Quarto</th>
						<th>Data de Entrada</th>
						<th>Data de Saída</th>
                        <th colspan="1">Ações de Controle</th>
                    </tr>
                </thead>
                <?php
                    while ($row = $result->fetch_assoc()): ?>
                        <form action="CRUD_RESERVA.php" method="POST">
						<input type="hidden" name="idquarto" value="<?php echo $row['ID_QRT'];?>">
						<input type="hidden" name="idusuario" value="<?php echo $_SESSION['usuarioId'];?>">
						<tr>
                            <td><input type="text" name="numquarto" placeholder="Número do quarto" class="form-control" id="exampleInputNquarto1" value="<?php echo $row['NUM_QRT'];?>" value disabled ></td>
                            <td><input type="text" name="capquarto" placeholder="Capacidade do quarto" class="form-control" id="exampleInputCquarto1" value="<?php echo $row['CAPACIDADE_QRT'];?>" value disabled ></td>
                            <td><input type="text" name="qtdcamas" placeholder="Quantidade de camas" class="form-control" id="exampleInputQcamas1" value="<?php echo $row['QTDCAMA_QRT'];?>" value disabled ></td>
							<td><input type="text" name="tpquarto" placeholder="Tipo do quarto" class="form-control" id="exampleInputTquarto1" value="<?php echo $row['TIPO_QRT'];?>" value disabled></td>
							<td><input type="date" name="dtentrada"  class="form-control" id="exampleInputDentrada1" ></td>
							<td><input type="date" name="dtsaida"  class="form-control" id="exampleInputDsaida1" ></td>
                            <td>
							<button class="btn btn-success width-full" class="form-control" style="color: #ffffff" value="reservar" name="action">Reservar</button><br>	
                            </td>
                        </tr>  
						</form>                         
                <?php endwhile; ?>
            </table>
		</div>
</div>

			<div class="container">
            <div style="height: 90px"></div>
        </div>

        <footer style="width:100%; line-height: 0px;bottom: 0;position: fixed;">
                <p>Todos os direitos reservados - Hotel Paraíso 2019
        </footer>
    </body>
</html>
