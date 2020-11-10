<?php

/**
 * ctrlLogin:  Fa les comprovacions necessaries per saber si t'ha de redireccionar a la vista del Login si no estas logat o a la portada si si que estas logat  
 *
 * L'usuari generic no es pot loguejar
 * 
 * @param $get parametres passats per $_GET a index.php
 * @param $sessio parametres emmagatzemats a la sessio actual
**/
function ctrlLogin($get,$sessio)
{

    $log = $sessio->get("logged");
    
    if ($log == true) 
    {
        header("Location: index.php?r=portada");
    }

    $error = $sessio->get("error");

    $sessio->set("error","");

    if (!isset($usuari)) {
        $usuari = "";
    }

    $usuari = $sessio->get("usuari");

    include "../src/views/loginView.php";
}