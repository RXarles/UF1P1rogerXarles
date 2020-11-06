<?php

function ctrlPortada($sessio)
{  
    include "../src/config.php";

    $link = $images[1]["link"];

    $enllacos = $linksInicials;

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