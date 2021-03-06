<?php
session_start();
require "../conecta.php";

//error_reporting(0);
if ($_SESSION["id"] > 0) { } else {
    header("Location: ../index.php");
}

function mysqli_result($res, $row, $field = 0)
{
    $res->data_seek($row);
    $datarow = $res->fetch_array();
    return $datarow[$field];
}

function generarTarjetas()
{
    $con = conecta();

    $sql = "SELECT * FROM productos WHERE status = 1 AND eliminado = 0";
    $res = mysqli_query($con, $sql);
    $num = mysqli_num_rows($res);

    for ($i = 0; $i < $num; $i++) {
        $id                  = mysqli_result($res, $i, "id");
        $nombre              = mysqli_result($res, $i, "nombre");
        $descripcion         = mysqli_result($res, $i, "descripcion");
        $costo               = mysqli_result($res, $i, "costo");
        $archivo             = mysqli_result($res, $i, "archivo_n");

        echo "
        <article id=" . $id . " class=\"card\">
            <div><a href=\"ver_producto.php?id=".$id."&t=0\" ><img class=\"picPrev\" src=\"../productos/archivos/" . $archivo . ".jpg\" ></a></div>
            <div><a class=\"costo\" >$" . $costo . "</a></div>  
            <div><a class=\"name\">" . $nombre . "</a></div>
            <div><a class=\"description\" >" . $descripcion . "</a></div><br><br>

            <a class=\"agregarButton\" onclick=\"agregarAlCarrito(" . $id . "); return false; \" >Agregar al carrito</a>
        </article>";
    }
}

?>

<html>

<head>
    <title>Inicio</title>
    <link rel="stylesheet" type="text/css" href="../css/toast.css">
    <link rel="stylesheet" type="text/css" href="../css/usercss.css">
    <script src="../resource/jquery-3.3.1.js"></script>
    <script>
        function myFunction(text) {
            // Get the snackbar DIV
            var x = document.getElementById("snackbar");

            // Add the "show" class to DIV
            x.className = "show";
            $('#snackbar').html(text);

            // After 3 seconds, remove the show class from DIV
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        }
    </script>
    <script>
        function agregarAlCarrito(productoF) {
            $.ajax({
                type: "POST",
                url: "agregar-al-carrito.php",
                dataType: 'json',
                data: ({
                    "producto": productoF,
                    "cantidad": "1"
                }),

                complete: function() {
                    console.log("Finish POST");
                    myFunction("Producto agregado con exito");
                    document.getElementById('header').contentWindow.location.reload();
                },
                success: function() {
                    console.log("Success POST");
                }
            })
        }
    </script>
</head>

<body>
    <iframe id="header" src="header.php" height="115" width="101.2%" frameBorder="0" scrolling="no"></iframe>
        <div class="contenedor">
        <div class="centered">

<section class="cards">
    <?php generarTarjetas(); ?>

</section>
</div>
<div id="snackbar" name="snackbar"></div>
        </div>
    <iframe id="header" src="footer.php" height="100" width="101.2%" frameBorder="0" scrolling="no" ></iframe>
</body>

</html>