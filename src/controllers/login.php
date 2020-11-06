<?php

function ctrlLogin($get,$sessio)
{

    $log = $sessio->get("logged");
    
    if ($log == true) 
    {
        header("Location: index.php?r=portada");
    }

    $error = $sessio->get("error");



    if (!isset($error)) {
        $error = "";
    }
    else{
        $sessio->set("error",""); // Perque nomes faci un cop l'error
    }

    
    if (!isset($usuari)) {
        $usuari = "";
    }
    $usuari = $sessio->get("usuari");

    include "../src/views/loginView.php";

}