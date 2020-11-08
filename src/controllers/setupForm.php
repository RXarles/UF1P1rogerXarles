<?php

function ctrlSetupForm($post, $sessio,$enllacos,$usuaris)
{
    // IMATGE DE FONS
    if ((int)$_POST["linkSelection"] != 0) {
        $usuaris->updateBackgroundImage($sessio->get("usuari"),(int)$_POST["linkSelection"]);
    }

    //ENLLAÇOS

    $titolAux = $_POST["titol"];
    $enllacAux = $_POST["enllac"];
    $afegir = $_POST["afegir"];

    $usuari = $_POST["userSelection"];

    $sessio->set("error","");

    if($usuari != "-")
    {
        $userSQL = $usuaris->consult($usuari);

        $enllac = array();
    
        if (is_array($enllacAux) && is_array($afegir)) {
            for ($i = 0; $i < sizeOf($enllacAux); $i++) {
                if (!empty($titolAux[$i]) && validateURL($enllacAux[$i]) && in_array('afegir' . ($i + 1), $afegir)) {
                    
                    $titol = validateString($titolAux[$i]);
    
                    array_push($enllac, array("titol" => $titol, "link"=> $enllacAux[$i], "codiUsuari"=>$userSQL['codi']));
                }
            }
    
            $enllacos->deleteFromUser($userSQL['codi']);
    
            $enllacos->insertMultiple($enllac);
        } 
    
        header("Location: index.php?r=portada");
    }
    else
    {
        $sessio->set("error","Introdueix un usuari!!!");
        header("Location: index.php?r=setup");
    }
}