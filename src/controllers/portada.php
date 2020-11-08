<?php

function ctrlPortada($sessio,$enllacos,$usuaris)
{  
    if($sessio->get("logged")==false)
    {
        $sessio->set("error","Has d'iniciar sessio"); 
        header("Location: index.php?r=login");
    }

    include "../src/config.php";

    $usuari = $sessio->get("usuari");

    $userSQL = $usuaris->consult($usuari);


    $linkImatge = $imatges[$userSQL['fonsindex']]["link"]; 


    $enllacosDefault = $enllacos->consultFromUser(1);


    $linkEnllacos = array();

    foreach($enllacosDefault as $e)
    {
        array_push($linkEnllacos,["link"=>$e["link"],"titol"=>$e["titol"]]); 
    }

    $displaySettings = false;

    if($userSQL['codi'] != 1)
    {
        $displaySettings = true;

        
        $enllacosAditionals = $enllacos->consultFromUser($userSQL['codi']);

        foreach($enllacosAditionals as $e)
        {
            array_push($linkEnllacos,["link"=>$e["link"],"titol"=>$e["titol"]]); 
        }    
    }

    $calendari = creaCalendari(date('n'), date('Y'), array(12));

    
    if($sessio->get("logged")==true)
    {
        include "../src/views/portadaView.php";
    }
}