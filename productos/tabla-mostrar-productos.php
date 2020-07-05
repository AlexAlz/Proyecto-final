<?php
session_start();
require "lista_productos.php";

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
    <link rel="stylesheet" type="text/css" href="../css/toast.css">
    <link rel="stylesheet" type="text/css" href="../css/styleAdmin.css">
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
        function eliminarRegistro(deleteId) {
            if (confirm("Desea eliminar al producto con ID: " + deleteId)) {
                console.log(deleteId);
                $.ajax({
                    type: "post",
                    url: "eliminar_producto.php",
                    data: {
                        id: deleteId
                    },

                    success: function() {
                        $('#' + deleteId).hide();
                        myFunction("Producto con ID: "+deleteId+" eliminado con exito");
                    }
                })
            }
            else {
                myFunction("Eliminacion de producto cancelada");
            }
        }
    </script>

</head>

<body>
    <!-- Barra de navegacion -->
    <iframe id="header" src="../header.php" height="100" width="101.2%" frameBorder="0" scrolling="no"></iframe>

    <br>
    <div id="alta-back">
        <a class="backButton" href="../home.php">Regresar</a> <!-- Menu Principal -->
        <a class="newButton" href="formulario_productos.php" id="alta">Registrar nuevo producto</a> <!-- Agregar Administradores-->
    </div>
    <br>

    <div id="tabla-admins">

        <!-- archivo | id | nombre | apellidos | correo | rol  || eliminar -->
        <!--  editar   -->
        <!--  ver      -->
        <table>
            <tr>
                <td colspan="8" style="text-align: center;"><br> Productos <br><br></td>
            </tr>

            <!-- Nombres de columnas -->
            <tr>
                <td><a>Imagen</a></td>
                <td><a>ID</a></td>
                <td><a>Nombre</a></td>
                <td><a>Codigo</a></td>
                <td><a>Descripcion</a></td>
                <td><a>Costo</a></td>
                <td><a>Stock</a></td>
                <td>
            </tr>

            <!-- EJEMPLO DE REGISTRO EN TABLA 
                <tr class="row" >
                    <td><img src="img/reset.png" class="profile-pic" ></td>
                    <td><a>1</a></td>
                    <td><a>Juan Ricardo</a> <a>Becerra Mata</a></td>
                    <td><a>ronkeyx5@gmail.com</a></td>
                    <td><a>Administrador</a></td>
                    <td>
                        <div>
                            <a class="button" id="eliminarButton" href="#Eliminar" >Eliminar</a><br><br>
                            <a class="button" id="editarButton" href="#Editar" >Editar</a><br>
                            <a class="button" id="verButton" href="#Ver" >Ver</a>
                        </div>
                    </td>
                </tr>
                <!-- ## AQUI ##-->

            <?php generarRows(); ?>
            <div id="snackbar" name="snackbar"></div>
            <!-- Rows generados por PHP || Administradores -->

        </table>
    </div>
</body>

</html>