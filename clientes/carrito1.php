<?php
session_start();
require "../conecta.php";
//error_reporting(0);

function mostrarProductos()
{
    $con = conecta();
    $id = $_SESSION['id'];

    $sql = "SELECT * FROM carrito WHERE id_cliente='$id'";
    $res = mysqli_query($con, $sql);
    $num = mysqli_num_rows($res);

    $_SESSION['carrito'] = $num;

    if ($num > 0) {
        $total_pedido = 0;
        for ($i = 0; $i < $num; $i++) {
            $productoid    = mysqli_result($res, $i, "id_producto");
            $cantidad      = mysqli_result($res, $i, "cantidad");

            $sql2 = "SELECT * FROM productos WHERE id='$productoid'";
            $con2 = conecta();
            $res2 = mysqli_query($con2, $sql2);


            $nombre              = mysqli_result($res2, 0, "nombre");
            $codigo              = mysqli_result($res2, 0, "codigo");
            $descripcion         = mysqli_result($res2, 0, "descripcion");
            $costo               = mysqli_result($res2, 0, "costo");
            $archivo             = mysqli_result($res2, 0, "archivo_n");

            $total = $cantidad * $costo;
            $total_pedido = $total_pedido + $total;

            echo "<tr id=\"" . $productoid . "\" class=\"row\">
                    <td><a>" . $i . "</a></td>
                    <td><input id=\"input".$productoid."\" onchange=\"updateCarrito(".$productoid."); return false;\" value=\"" . $cantidad . "\" type=\"number\" ></td>
                    <td><img src=\"../productos/archivos/" . $archivo . ".jpg\" class=\"profile-pic\" ></td>
                    <td><a>" . $productoid . "</a></td>
                    <td style=\"word-wrap: break-word; max-width: 150px;\"><a>" . $nombre . "</a>
                    <td><a>" . $codigo . "</a></td>
                    <td style=\"word-wrap: break-word; max-width: 200px;\"  ><a>" . $descripcion . "</a></td>
                    <td><a>$" . $costo . "</a></td>
                    <td><a class=\"button eliminarButton\" onclick=\"eliminar(" . $productoid . "); return false;\" >Eliminar</a></td>
                </tr>";
        }
    } else {
        echo "Sin productos dentro del carrito. <br><br>";
    }
}

function siguienteButton()
{
    if ($_SESSION['carrito'] > 0) {
        echo "<a class=\"next\" onclick=\"validarCarrito(); return false;\" >Siguiente</a>";
    }
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
    <title>Carrito 1/2</title>
    <link rel="stylesheet" type="text/css" href="../css/toast.css">
    <link rel="stylesheet" type="text/css" href="../css/carrito.css">
    <script src="../resource/jquery-3.3.1.js"></script>

    <script>
        function eliminar(productoF) {
            if (confirm("Desea eliminar del carrito al producto con ID: " + productoF)) {

                $.ajax({
                    type: "POST",
                    url: "eliminar-del-carrito.php",
                    dataType: 'json',
                    data: ({
                        "producto": productoF
                    }),

                    complete: function() {
                        console.log("Finish POST");
                        $('#' + productoF).hide();
                        myFunction("Producto eliminado con exito");
                    },
                    success: function() {
                        console.log("Success POST");
                    }
                })
            }
        }

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

        function updateCarrito(productoF) {
            var cantidadF = $('#input'+productoF).val();
            console.log(cantidadF);

            $.ajax({
                type: "POST",
                url: "actualizar-carrito.php",
                dataType: 'json',
                data: ({
                    "producto": productoF,
                    "cantidad": cantidadF
                }),

                complete: function() {
                    console.log("Finish POST");
                    console.log(productoF);
                },
                success: function() {
                    console.log("Success POST");
                }
            })
        }

        function validarCarrito() {
            window.location = "carrito2.php";
        }
    </script>
</head>

<body>
    <center><div class="top">
        <h2 id="title">Carrito de compra</h2>
    </div><br>
    <div>
        <a class="button eliminarButton" style="float:left; padding:8px;" href="vaciar-carrito.php">Vaciar Carrito</a><br><br><br>
        <table>
            <tr>
                <td><a>#</a></td>
                <td><a>Cantidad</a></td>
                <td><a>Imagen</a></td>
                <td><a>ID</a></td>
                <td><a>Nombre</a></td>
                <td><a>Codigo</a></td>
                <td><a>Descripcion</a></td>
                <td><a>Costo</a></td>
                <td><a></a></td>
            </tr>

            <?php mostrarProductos(); ?>

        </table>
        <br><br>
        <a id="backButton" href="home.php">Regresar</a>
        <?php siguienteButton(); ?>
    </div></center>
    <div id="snackbar" name="snackbar"></div>
</body>

</html>