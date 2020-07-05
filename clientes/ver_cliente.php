<?php
require "../conecta.php";

session_start();

error_reporting(0);
if ($_SESSION["id"] > 0) {
    //echo $_SESSION["id"];
} else {
    header("Location: ../index.php");
}

$id = $_GET['id'];
$t = $_GET['t'];

$con = conecta();

$sql = "SELECT * FROM clientes WHERE id = " . $id . " AND status = 1 AND eliminado = 0";
$res = mysqli_query($con, $sql);
$num = mysqli_num_rows($res);

if ($num != 0) {

    $id             = mysqli_result($res, 0, "id");
    $nombre         = mysqli_result($res, 0, "nombre");
    $apellidos      = mysqli_result($res, 0, "apellidos");
    $correo         = mysqli_result($res, 0, "correo");
}


function mysqli_result($res, $row, $field = 0)
{
    $res->data_seek($row);
    $datarow = $res->fetch_array();
    return $datarow[$field];
}

?>

        <html>

        <head>
            <title>Mostrando cliente</title>
            <link rel="stylesheet" type="text/css" href="../css/toast.css">
            <link rel="stylesheet" type="text/css" href="../css/editUser.css">
            
            <script>
                function myFunction() {
                    // Get the snackbar DIV
                    var x = document.getElementById("snackbar");

                    // Add the "show" class to DIV
                    x.className = "show";

                    // After 3 seconds, remove the show class from DIV
                    setTimeout(function() {
                        x.className = x.className.replace("show", "");
                    }, 3000);
                }
            </script>
        </head>

        <body>
            <iframe id="header" src="../header.php" height="100" width="101.2%" frameBorder="0" scrolling="no"></iframe>
            <a id="backButton" href="tabla-mostrar-cliente.php">Regresar</a><br><br>

            <center><div id="container">
                <a class="label g">ID </a><a class="dato"><?php echo $id; ?></a><br><br>
                <a class="label f">Nombre </a><a class="dato"><?php echo $nombre; ?> <?php echo $apellidos; ?></a><br>
                <a class="label g">Correo </a><a class="dato"><?php echo $correo; ?></a><br><br>
            </div></center>

            <div id="snackbar" name="snackbar">Cliente modificado con exito</div>
            <?php if ($t == 1) {
                echo "<script>myFunction();</script>";
            }
            ?>

        </body>

        </html>