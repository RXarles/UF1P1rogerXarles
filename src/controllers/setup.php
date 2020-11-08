<?php

function ctrlSetup($sessio,$usuaris)
{
    include "../src/config.php";
    

    if($sessio->get("logged")==true)
    {
        $images = $imatges;

        $usuari = $sessio->get("usuari");

        $userSQL = $usuaris->consult($usuari);

        if($userSQL['codi'] == 1)
        {
            header("Location: index.php?r=portada");
        }
        else
        {
            include "../src/views/setupView.php";
        }
    }
    else
    {

        $sessio->set("error","Has d'iniciar sessio"); 
        
        header("Location: index.php?r=login");
    }
}
