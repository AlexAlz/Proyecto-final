<?php
require "conecta.php";
$con = conecta();

/* ############################# */
/* ARCHIVO */

$file_name = $_FILES['archivo']['name'];          
$file_tmp  = $_FILES['archivo']['tmp_name'];       
$cadena    = explode(".", $file_name);             
$ext       = $cadena[1];                            
$dir       = "archivos\\";                          
$file_enc  = md5_file($file_tmp);                  


echo "file_name: $file_name <br>";
echo "file_tmp: $file_tmp <br>";
echo "ext: $ext <br>";
echo "file_enc: $file_enc <br>";

if ($file_name != '') {
    $fileName1 = "$file_enc.$ext";
    copy($file_tmp, $dir.$fileName1);
}

/* ############################ */
/* DATOS SQL */

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$pass = $_POST['pass'];
$passEnc = md5($pass);
$rol = $_POST['rol'];

$archivo = $file_name;
$archivo_n = $file_enc;

$sql = "INSERT INTO administradores VALUES (0, '$nombre', '$apellidos', '$correo', '$passEnc', $rol, '$archivo_n', '$archivo', 1, 0)";
$res = mysqli_query($con, $sql);

echo "$res";

echo "<br> $nombre $apellidos -- $archivo";

//header("Location: lista_administradores.php");
?>