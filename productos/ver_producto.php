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

$sql = "SELECT * FROM productos WHERE id = " . $id . " AND status = 1 AND eliminado = 0";
$res = mysqli_query($con, $sql);
$num = mysqli_num_rows($res);

if ($num != 0) {

    $id             = mysqli_result($res, 0, "id");
    $nombre         = mysqli_result($res, 0, "nombre");
    $codigo      = mysqli_result($res, 0, "codigo");
    $descripcion         = mysqli_result($res, 0, "descripcion");
    $stock            = mysqli_result($res, 0, "stock");
    $costo              = mysqli_result($res, 0, "costo");
    $archivo            = mysqli_result($res, 0, "archivo_n");
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
            <title>Mostrando producto</title>
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
            <a id="backButton" href="tabla-mostrar-productos.php">Regresar</a><br><br>

            <center><div id="container">
                <div style="width: 100%;"><img style="margin:auto ;" src="archivos/<?php echo $archivo; ?>.jpg"></div><br><br>
                <a class="label f">Nombre </a><a class="dato"><?php echo $nombre; ?></a><br><br>
                <a class="label g">Codigo </a><a class="dato"><?php echo $codigo; ?></a><br><br>
                <div style="display:inline-block;" ><a class="label f" >Descripcion </a><div style=" float:right; word-wrap: break-word; max-width: 250px;"><a class="dato"><?php echo $descripcion; ?></a></div></div><br><br>
                <a class="label g">Stock </a><a class="dato"><?php echo $stock; ?></a><br><br>
                <a class="label f" >Costo </a><a class="dato">$<?php echo $costo; ?></a><br><br>
            </div></center>

            <div id="snackbar" name="snackbar">Producto modificado con exito</div>
            <?php if ($t == 1) {
                echo "<script>myFunction();</script>";
            }
            ?>

        </body>

        </html>