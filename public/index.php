<?php
//error_reporting(E_ERROR | E_WARNING | E_PARSE);


include "../src/config.php";
include "../src/funcions.php";

include "../src/controllers/login.php";
include "../src/controllers/loginForm.php";
include "../src/controllers/portada.php";
include "../src/controllers/setup.php";
//include "../src/controllers/setupForm.php";


$r = $_REQUEST["r"];


$dsn = 'mysql:dbname=cae_daw;host=localhost';
$admin = 'root';
$clau = 'WhateverPassword';
try {
    $sql = new PDO($dsn, $admin, $clau);
} catch (PDOException $e) {
    die('Ha fallat la connexió: ' . $e->getMessage());
}



$imatges = new Daw\Imatges();
$sessio = new Daw\Sessio();


if($r=="setup")
{
    ctrlSetup($sessio); // FUNCIONA
}
else if($r == "setupForm")
{
    //ctrlSetupForm($_POST, $sessio); // EN CONSTRUCCIO
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
else {
    header("Location:index.php?r=login");
}

