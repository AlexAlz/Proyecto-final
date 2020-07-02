<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario</title>
    <link rel="stylesheet" href="../css/contacto.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,800,900" rel="stylesheet">
</head>
<body>

<center><iframe id="header" src="header.php" height="100" width="101.2%" frameBorder="0" scrolling="no"></iframe>
    <form action="envcontacto.php" method="POST">
        <div class="form">
            <h1>Contactanos</h1>
            <div class="grupo">
                <input type="text" name="nombre" id="" required><span class="barra"></span>
                <label>Nombre</label>
            </div>
            <div class="grupo">
                <input type="email" name="correo" id="" required><span class="barra"></span>
                <label>Email</label>
            </div>
            <div class="grupo">
                <input type="text" name="asunto" id="" required><span class="barra"></span>
                <label>Asunto</label>
            </div>
            <div class="grupo">
                <textarea name="mensaje" id="" rows="3" required></textarea><span class="barra"></span>
                <label>Mensaje</label>
            </div>
            <button type="submit">Enviar</button>
        </div>
    </form></center>
</body>
<iframe id="header" src="footer.php" height="100" width="101.2%" frameBorder="0" scrolling="no" ></iframe>
</html>