<?php

/**
 * ctrlPortada:  Comprova si estas logat i de ser aixi et deixa modificar els teus enllaços i fons de pantalla personalitzats
 *
 * L'usuari administrador pot gestionar els enllaços i fons de pantalla de tots
 * 
 * 
 * @param $sessio parametres emmagatzemats a la sessio actual
 * @param $usuaris model per treballar amb la taula usuari de la base de dades
**/
function ctrlSetup($sessio,$usuaris)
{
    include "../src/config.php";
    

    if($sessio->get("logged")==true)
    {

        $numEnllacos = 4;

        $error = $sessio->get("error");

        $sessio->set("error",""); // Perque nomes faci un cop l'error

        $usuari = $sessio->get("usuari");

        $admin = isAdmin($usuari);

        if(!isDefault($usuari))
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
