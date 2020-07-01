<?php
session_start();

error_reporting(0);
if ($_SESSION["id"] > 0) { } else {
    header("Location: login.php");
}
?>

<html>

<head>
<link rel="stylesheet" type="text/css" href="css/adminheader.css">
</head>

<body>
    <header>
		<div class="wrapper">
			<!--<div class="logo">PhoneLand</div>-->
			<nav>
                <a class="line" id="backButton" href="home.php" target="_PARENT">INICIO</a>
                <a class="line" id="backButton" href="tabla-mostrar-usuarios.php" target="_PARENT" >USUARIOS</a>
                <a class="line" id="backButton" href="productos/tabla-mostrar-productos.php" target="_PARENT" >PRODUCTOS</a>
                <a class="line" id="backButton" href="clientes/tabla-mostrar-cliente.php" target="_PARENT" >CLIENTES</a>
                <a class="line" id="backButton" href="pedidos/tabla-mostrar-pedidos.php" target="_PARENT" >PEDIDOS</a>
                <div class="cuenta"> 
                    <a class="line" id="cerrarButton" href="closeSession.php" target="_PARENT" >CERRAR SESION</a>
                    <a class="sesionName" id="name" ><?php echo $_SESSION["nombre"]; ?></a>
                    <img id="profilePic" src="archivos/<?php echo $_SESSION["pic"]; ?>.jpg">

                </div>
			</nav>
		</div>
	</header>
</body>

</html>