<?php
session_start();
require "lista_administradores.php";

error_reporting(0);
if ($_SESSION["id"] > 0) {
    //echo $_SESSION["id"];
} else {
    header("Location: index.php");
}
?>

<html>

<head>
    <title>Mostrar Usuarios</title>
    <link rel="stylesheet" type="text/css" href="css/toast.css">
    <link rel="stylesheet" type="text/css" href="css/styleAdmin.css">

    <script src="resource/jquery-3.3.1.js"></script>
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
            if (confirm("Desea eliminar al usuario con ID: " + deleteId)) {
                console.log(deleteId);
                $.ajax({
                    type: "post",
                    url: "eliminar_usuario.php",
                    data: {
                        id: deleteId
                    },

                    success: function() {
                        $('#' + deleteId).hide();
                        myFunction("Usuario con ID: "+deleteId+" eliminado con exito");
                    }
                })
            }
            else {
                myFunction("Eliminacion de usuario cancelada");
            }
        }
    </script>

</head>

<body>
    <!-- Barra de navegacion -->
    <iframe id="header" src="header.php" height="100" width="101.2%" frameBorder="0" scrolling="no"></iframe>

    <br>
    <div id="alta-back">
        <a class="backButton" href="home.php">Regresar</a> <!-- Menu Principal -->
        <a class="newButton" href="Formulario.php" id="alta">Registrar nuevo usuario</a> <!-- Agregar Administradores-->
    </div>
    <br>

    <div id="tabla-admins">

      
        <table>
            <tr>
                <td colspan="7" style="text-align: center;"><br> Administradores <br><br></td>
            </tr>

            <!-- Nombres de columnas -->
            <tr>
                <td><a>Profile pic</a></td>
                <td><a>ID</a></td>
                <td><a>Nombre</a></td>
                <td><a>Correo</a></td>
                <td><a>Rol</a></td>
                <td>

                </td>
            </tr>


            <?php generarRows(); ?>
            <div id="snackbar" name="snackbar"></div>
            <!-- Rows generados por PHP || Administradores -->

        </table>
    </div>
    <!--<iframe id="header" src="footer.php" height="100" width="101.2%" frameBorder="0" scrolling="no" ></iframe>-->
</body>

</html>