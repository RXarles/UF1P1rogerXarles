<?php

function ctrlPortada($sessio)
{  
    include "../src/config.php";



    // CANVIAR AL PAS 4

    $usuari = $sessio->get("usuari");

    $lnk = $sessio->get("link"); 

    $ses = $sessio->get("enllacos");

    if(!is_null($lnk))
    {
        $link = $imatges[$lnk]["link"]; 
    }
    else
    {
        $link = $imatges[1]["link"]; 
    }


    if(!is_null($ses))
    {
        $enllacos = $ses; 

    }
    else
    {
        $enllacos = $linksInicials; 
    }
    // 


    $calendari = creaCalendari(date('n'), date('Y'), array(12));


    if($sessio->get("logged")==true)
    {
        include "../src/views/portadaView.php";
    }
    else
    {
        $sessio->set("error","Has d'niciar sessio"); 
        header("Location: index.php?r=login");
    }
}