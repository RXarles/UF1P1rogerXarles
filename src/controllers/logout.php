<?php

/**
 * ctrlLogout:  "Esborra" les dades de la sessio actual
 *
 * @param $sessio parametres emmagatzemats a la sessio actual
**/
function ctrlLogout($sessio)
{
    $sessio->set("logged",false);
    $sessio->set("enllacos",NULL);
    $sessio->set("link",NULL); 
    
    header("Location: index.php?r=login");
}