<?php

/**
 * ctrlPortada:  Comprova si estas logat i de ser aixi carrega tots els enllaços i el fons de pantalla depenent de l'usuari 
 *
 * @param $sessio parametres emmagatzemats a la sessio actual
 * @param $enllacos model per treballar amb la taula enllac de la base de dades
 * @param $usuaris model per treballar amb la taula usuari de la base de dades
**/
function ctrlPortada($sessio,$enllacos,$usuaris)
{  
    if($sessio->get("logged")==false)
    {
        $sessio->set("error","Has d'iniciar sessio"); 
        header("Location: index.php?r=login");
        die();
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


    if(!isDefault($userSQL['nom']))
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