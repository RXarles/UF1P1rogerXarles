<?php
//error_reporting(E_ERROR | E_WARNING | E_PARSE);


include "../src/config.php";
include "../src/funcions.php";

include "../src/controllers/login.php";
include "../src/controllers/loginForm.php";
include "../src/controllers/logout.php";
include "../src/controllers/portada.php";
include "../src/controllers/setup.php";
include "../src/controllers/setupForm.php";


$r = $_REQUEST["r"];


$sql = iniciaSQL();



$imatges = new Daw\Imatges();
$sessio = new Daw\Sessio();


if($r=="setup")
{
    ctrlSetup($sessio); // FUNCIONA
}
else if($r == "setupForm")
{
    ctrlSetupForm($_POST, $sessio); // EN CONSTRUCCIO
}
else if($r=="portada")
{
    ctrlPortada($sessio); // FUNCIONA
}
else if($r == "loginForm")
{
    ctrlLoginForm($_POST, $sessio,$sql); // FUNCIONA
}
else if($r == "login"){
    ctrlLogin($_GET, $sessio); // FUNCIONA
}
else if($r == "logout"){
    ctrlLogout($sessio); // EN CONSTRUCCIO
}
else {
    header("Location:index.php?r=login");
}

