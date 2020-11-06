<?php

function ctrlSetup($sessio)
{
    include "../src/config.php";
    
    if($sessio->get("logged")==true)
    {
        $images = $imatges;

        $usuari = $sessio->get("usuari");
        include "../src/views/setupView.php";
    }
    else
    {
        $sessio->set("error","Has d'niciar sessio"); 
        header("Location: index.php?r=login");
    }
}
