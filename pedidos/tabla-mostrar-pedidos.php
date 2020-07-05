<?php
session_start();
require "lista_pedidos.php";

error_reporting(0);
if ($_SESSION["id"] > 0) {
    //echo $_SESSION["id"];
} else {
    header("Location: ../index.php");
}
?>

<html>

<head>
    <title>Productos</title>
    <link rel="stylesheet" type="text/css" href="../css/styleAdmin.css">
    <script src="../resource/jquery-3.3.1.js"></script>
    <!-- TOAST --> 
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
        function eliminarRegistro(deleteId) {
            if (confirm("Desea eliminar al pedido con ID: " + deleteId)) {
                console.log(deleteId);
                $.ajax({
                    type: "post",
                    url: "eliminar_pedido.php",
                    data: {
                        id: deleteId
                    },

                    success: function() {
                        $('#' + deleteId).hide();
                        myFunction("Pedido con ID: "+deleteId+" eliminado con exito");
                    }
                })
            }
            else {
                myFunction("Eliminacion de pedido cancelada");
            }
        }
    </script>

</head>

<body>
    <!-- Barra de navegacion -->
    <iframe id="header" src="../header.php" height="100" width="101.2%" frameBorder="0" scrolling="no"></iframe>

    <br>
    <!-- FORMULARIO, NO NECESARIO 
    <div id="alta-back">
        <a class="backButton" href="../home.php">Regresar</a> <!-- Menu Principal ->
        <a class="backButton" href="formulario_productos.php" id="alta">Registrar nuevo producto</a> <!-- Agregar Administradores->
    </div>
    <br>
    -->
    <div id="tabla-admins">
        <table>
            <tr>
                <td colspan="8" style="text-align: center;"><br> Pedidos <br><br></td>
            </tr>

            <!-- Nombres de columnas -->
            <tr>
                <td><a>ID</a></td>
                <td><a>Fecha</a></td>
                <td><a>ID Usuario</a></td>
                <td><a>Nombre</a></td>
                <td><a>Status</a></td>
                <td>
            </tr>

            <?php generarRows(); ?>
            <div id="snackbar" name="snackbar"></div>

        </table>
    </div>
</body>

</html>