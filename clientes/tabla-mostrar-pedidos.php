<?php
session_start();
require "lista_pedidos.php";
?>

<html>

<head>
    <title>Productos</title>
    <link rel="stylesheet" type="text/css" href="../css/toast.css">
    <link rel="stylesheet" type="text/css" href="../css/pedidos.css">

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

</head>

<body>
    <!-- Barra de navegacion -->
    <iframe id="header" src="header.php" height="100" width="101.2%" frameBorder="0" scrolling="no"></iframe>

    <br>
    <div class="contenedor">
    <div id="tabla-admins">
        <table>
            <tr>
                <td colspan="8" style="text-align: center;"><br> Pedidos <br><br></td>
            </tr>

            <!-- Nombres de columnas -->
            <tr>
                <td><a>ID</a></td>
                <td><a>Fecha</a></td>
                <td><a>Status</a></td>
                <td>
            </tr>

            <?php generarRows(); ?>
            <div id="snackbar" name="snackbar"></div>

        </table>
    </div>
    </div>
    
</body>
<iframe id="header" src="footer.php" height="100" width="101.2%" frameBorder="0" scrolling="no" ></iframe>
</html>