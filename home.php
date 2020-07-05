<?php
session_start();

error_reporting(0);
if($_SESSION["id"] > 0) {
    }
else {
    header("Location: index.php");
    }
?>

<html>

<head>
    <title>Inicio</title>
    <link rel="stylesheet" type="text/css" href="css/adminhome.css">
</head>

<body>
    <iframe id="header" src="header.php" height="100" width="101.2%" frameBorder="0" scrolling="no" ></iframe>
         <div class="contenedor">
             <center class="title">
             <h1>Administracion</h1>
             <h2>PhoneLand</h2>
             </center>
        </div>
    
</body>
<iframe id="header" src="footer.php" height="100" width="101.2%" frameBorder="0" scrolling="no" ></iframe>
</html>