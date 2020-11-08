<?php

function ctrlSetup($sessio,$usuaris)
{
    include "../src/config.php";
    

    if($sessio->get("logged")==true)
    {
        $usuari = $sessio->get("usuari");

        if(isAdmin($usuari))
        {
            $images = $imatges;

            $usuarisPerConfigurar = $usuaris->list();

            include "../src/views/setupView.php";
        }
        else
        {
            header("Location: index.php?r=portada");
        }
    }
    else
    {

        $sessio->set("error","Has d'iniciar sessio"); 
        
        header("Location: index.php?r=login");
    }
}
