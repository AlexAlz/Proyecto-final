<?php
require "carrito-count.php";

error_reporting(0);
if ($_SESSION["id"] > 0) { } else {
    header("Location: index.php");
}
?>

<html>

<head>
    <link rel="stylesheet" type="text/css" href="../css/mainheader.css">
</head>

<body>
    <header>
		<div class="wrapper">
			<div class="logo">PhoneLand</div>
			<nav>
                <a class="line" id="backButton" href="home.php" target="_PARENT">INICIO</a>
				<a class="line" id="backButton" href="productos.php" target="_PARENT">PRODUCTOS</a>
				<a class="line" id="backButton" href="tabla-mostrar-pedidos.php" target="_PARENT">MIS PEDIDOS</a>
                <a class="line" id="carrito" name="carrito" class="backButtonf" href="carrito1.php" target="_PARENT">&zwnj;<img src="img/carrito.png" style="max-height: 25px; margin: -5px; vertical-align: bottom;" target="_PARENT"> - <?php echo carritoCount(); ?></>
                <a class="line" id="backButton" href="contacto.php" target="_PARENT">CONTACTO</a>
                <div class="cuenta"> 
                    <a class="line" id="cerrarButton" href="../closeSession.php" target="_PARENT" >CERRAR SESION</a>
                    <a class="sesionName" id="name" ><?php echo $_SESSION["nombre"]; ?></a>
                </div>
			</nav>
		</div>
	</header>
</body>

</html>