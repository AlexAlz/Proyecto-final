<?php
require "conecta.php";

session_start();

error_reporting(0);
if ($_SESSION["id"] > 0) {
    //echo $_SESSION["id"];
} else {
    header("Location: index.php");
}

$id = $_GET['id'];
$t = $_GET['t'];

$con = conecta();

$sql = "SELECT * FROM administradores WHERE id = " . $id . " AND status = 1 AND eliminado = 0";
$res = mysqli_query($con, $sql);
$num = mysqli_num_rows($res);

if ($num != 0) {

    $id             = mysqli_result($res, 0, "id");
    $nombre         = mysqli_result($res, 0, "nombre");
    $apellidos      = mysqli_result($res, 0, "apellidos");
    $correo         = mysqli_result($res, 0, "correo");
    $rolNum            = mysqli_result($res, 0, "rol");
    $archivo            = mysqli_result($res, 0, "archivo_n");

    /* echo "$id --- $nombre $apellidos <br>"; */
    $rol = "";
    switch ($rolNum) {
        case "1":
            $rol = "Usuario";
            break;

        case "2":
            $rol = "Administrador";
            break;

        default:
            $rol = "Error";
            break;
    }
}

function mysqli_result($res, $row, $field = 0)
{
    $res->data_seek($row);
    $datarow = $res->fetch_array();
    return $datarow[$field];
}

function verUsuario()
{
    $id = $_GET['id'];

    $con = conecta();

    $sql = "SELECT * FROM administradores WHERE id = " . $id . " AND status = 1 AND eliminado = 0";
    $res = mysqli_query($con, $sql);
    $num = mysqli_num_rows($res);

    if ($num != 0) {

        $id             = mysqli_result($res, 0, "id");
        $nombre         = mysqli_result($res, 0, "nombre");
        $apellidos      = mysqli_result($res, 0, "apellidos");
        $correo         = mysqli_result($res, 0, "correo");
        $rolNum            = mysqli_result($res, 0, "rol");
        $archivo            = mysqli_result($res, 0, "archivo_n");

        /* echo "$id --- $nombre $apellidos <br>"; */
        $rol = "";
        switch ($rolNum) {
            case "1":
                $rol = "Usuario";
                break;

            case "2":
                $rol = "Administrador";
                break;

            default:
                $rol = "Error";
                break;
        }

        echo
            "
        " . $id . "<br>
        " . $nombre . " 
        " . $apellidos . "<br>
        " . $correo . "<br>
        " . $rol . "<br>
        <img src=\"archivos/" . $archivo . ".jpg\"><br>
        ";
    }
}
?>

        <html>

        <head>
            <title>Mostrando usuario</title>
            <link rel="stylesheet" type="text/css" href="css/toast.css">
            <link rel="stylesheet" type="text/css" href="css/editUser.css">
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
            <iframe id="header" src="header.php" height="100" width="101.2%" frameBorder="0" scrolling="no"></iframe>
            <a id="backButton" href="tabla-mostrar-usuarios.php">Regresar</a><br><br>

            <center><div id="container">
                <div style="width: 100%;" ><img style="margin:auto ;" src="archivos/<?php echo $archivo; ?>.jpg"></div><br><br>
                <a class="label">Nombre </a><a class="dato"><?php echo $nombre; echo " " . $apellidos; ?></a><br>
                <a class="label">Correo </a><a class="dato"><?php echo $correo; ?></a><br>
                <a class="label">Puesto </a><a class="dato"><?php echo $rol; ?></a><br>
            </div></center>

            <div id="snackbar" name="snackbar">Usuario modificado con exito</div>
            <?php if ($t == 1)  {
                echo "<script>myFunction();</script>";
            }
            ?>

        </body>

        </html>