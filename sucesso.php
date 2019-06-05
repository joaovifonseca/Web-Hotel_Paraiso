<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Hotel Paraíso</title>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<?php session_start();?>
<body>

    <header>
        <a href="#"><img src="img/logo.png" alt="Hotel Paraíso"></a>
        <nav>
            <li><a href="./index.html">Home</a></li>
            <li><a href="./reservas.php">Reservas</a></li>
            <li><a href="./Contato.html">Contato</a></li>
        </nav>
    </header>
    <div style="padding: 100px 100px 0 100px">
        <div class="form-group text-center">
            <h2>
                    <?php 
                    if(isset($_SESSION['textoSucesso']))
                    {
                        echo $_SESSION['textoSucesso']; 
                    } else {
                        echo "Ocorreu um erro";
                    }
                    ?>
                <br />
            </h2>
            <span class="glyphicon glyphicon-ok" style="font-size: 150px"></span>
            <br>
            <?php 
            $tipousu = $_SESSION['usuarioTipoUsu'];
            if($tipousu == "U") {
                echo "<button class='btn btn-success' style='margin-top: 50px' onclick='VoltarPagina()'>Voltar</button>";
            } else if($tipousu == "F") {
                echo "<button class='btn btn-success' style='margin-top: 50px' onclick='VoltarPaginaFunc()'>Voltar</button>";
            } else {
                echo "<button class='btn btn-success' style='margin-top: 50px' onclick='VoltarDefault()'>Voltar</button>";
            }
            ?>
            <script>
                function VoltarPagina() {
                    window.location.href="cliente.php";
                }
                function VoltarPaginaFunc() {
                    window.location.href="funcionario.php";
                }
                function VoltarDefault() {
                    window.location.href="index.html";
                }
            </script>
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