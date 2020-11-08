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



$sessio = new Daw\Sessio();


$usuaris = new Daw\Usuaris();
$usuaris->initialize($sql);

$enllacos = new Daw\Enllacos();
$enllacos->initialize($sql);



if($r == "login") // FUNCIONA
{ 
    ctrlLogin($_GET, $sessio); 
}
else if($r == "loginForm") // FUNCIONA
{
    ctrlLoginForm($_POST, $sessio,$sql); 
}
else if($r=="portada") // FUNCIONA
{
    ctrlPortada($sessio,$enllacos,$usuaris); 
}
else if($r=="setup")// EN CONSTRUCCIO
{
    ctrlSetup($sessio,$usuaris); 
}
else if($r == "setupForm")// EN CONSTRUCCIO
{
    ctrlSetupForm($_POST, $sessio,$enllacos,$usuaris); 
}
else if($r == "logout") // EN CONSTRUCCIO
{
    ctrlLogout($sessio); 
}
else 
{
    header("Location:index.php?r=login");
}

