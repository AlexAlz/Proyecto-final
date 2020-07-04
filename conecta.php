<?php
define ("HOST",'localhost');
define ("BD",'proyecto');
define ("USER_BD",'root');
define ("PASS_BD",'');

function conecta(){
    if(!($con = mysqli_connect(HOST,USER_BD,PASS_BD)))   {
        echo "Error conectando al Servidor de BD";
        exit();
    }
    if(!mysqli_select_db($con, BD))   {
        echo "Error seleccionando BD";
        exit();
    }
    return $con;
}
/*define ("HOST","db4free.net");
define ("BD","proyecto_final");
define ("USER_BD","alejandro_alz");
define ("PASS_BD","12345678");
define ("PORT", "3306");

function conecta(){
    if(!($con = mysqli_connect(HOST,USER_BD,PASS_BD,BD,PORT)))   {
        echo "Error conectando al Servidor de BD";
        exit();
    }
    if(!mysqli_select_db($con, BD))   {
        echo "Error seleccionando BD";
        exit();
    }
    return $con;
}*/
?>