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
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <!-- setando as os valores zerados -->

    <?php
        $id = 0;  
        $numero_quarto = '';
        $capacidade_quarto = '';
        $qtdcama_quarto = '';
        $tipo_quarto = '';
        $update = false;
    ?>

    <body>
        <?php
            require_once 'conexao.php';
            //Realizada alteração dos botões e seleção das informações a serem alteradas
                if(isset($_GET['alterar']))//Caso nome do Botão seja 'Alterar'
                {
                    //Requisitadas informações da tela de inserção
                    $id = $_GET['alterar'];
                    $update = true;
                    
                    $result = $conn->query("SELECT * FROM quarto WHERE ID_QRT=$id") or die($conn->error());
                
                    if($result->num_rows)
                    {
                        $row = $result->fetch_array();
                        $id = $row['ID_QRT'];
                        $numero_quarto = $row['NUM_QRT'];
                        $capacidade_quarto = $row['CAPACIDADE_QRT'];
                        $tipo_quarto = $row['TIPO_QRT'];
                        $qtdcama_quarto = $row['QTDCAMA_QRT'];
                    }
                        
                }

            
        ?>
        <header>
            <a href="#"><img src="img/logo.png" alt="Hotel Paraíso"></a>
			<nav>
                <li><a href="./index.html">Home</a></li>
                <li><a href="./reservas.php">Reservas</a></li>
                <li><a href="./Contato.html">Contato</a></li>
            </nav>
        </header>
		<form action="CRUD_QUARTO.php" method="POST">
        <input type="hidden" name="idquarto" value="<?php echo $id ?>">
		<div class="row container-login">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="form-group col-md-12">
                    <label for="exampleInputNome1">Número do Quarto</label>
                    <input type="number" name="nquarto" placeholder="Número do quarto" value="<?php echo $numero_quarto ?>" class="form-control" id="exampleInputNquarto1" >
                </div>
				<div class="form-group col-md-12">
                    <label for="exampleInputNome1">Capacidade do Quarto</label>
                    <input type="number" name="cquarto" placeholder="Capacidade do quarto" value="<?php echo $capacidade_quarto ?>" class="form-control" id="exampleInputCquarto1" >
                </div>
				<div class="form-group col-md-12">
                    <label for="exampleInputNome1">Tipo do Quarto</label>
                    <input type="text" name="tquarto" placeholder="Tipo quarto" value="<?php echo $tipo_quarto ?>" class="form-control" id="exampleInputNome1" >
                </div>
				<div class="form-group col-md-12">
                    <label for="exampleInputNome1">Quantidade de Camas</label>
                    <input type="number" name="qcamas" placeholder="Quantidade de camas" value="<?php echo $qtdcama_quarto ?>" class="form-control" id="exampleInputQcamas1" >
            </div>

                <div class="container-botoes">
                    <div class="col-sm-12">
                    <?php
                    if ($update == true):
                    ?>
                        <button class="btn btn-info width-full" style="margin: 30px 0 0 0px;color: #ffffff" value="update" name="update">Alterar Quarto</button><br>                 
                    <?php else: ?>
                        <button class="btn btn-success width-full" style="margin: 30px 0 0 0px;color: #ffffff" value="cadastrar" name="cadastrar">Cadastrar Quarto</button><br>	
                    <?php endif; ?>
                    </div>
                    </form>
                </div>
            </div>
		</div>

        <div class="container">
        <div style="height: 145px"></div>
    </div>
    <footer style="width:100%; line-height: 0px">
        <ul>
            <li>
                <a href=""><i class="fab fa-facebook"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fab fa-snapchat"></i></a>
                <a href=""><i class="fab fa-pinterest"></i></a>
            </li>
        </ul>
        <p>Todos os direitos reservados - Hotel Paraíso 2019
    </footer>
		
    </body>
</html>
