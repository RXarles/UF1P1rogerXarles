<?php

/**
 * ctrlPortada:  Actualitza les dades de la base dades depenent del que s'hagi introduit al formulari del setup
 *
 * @param $post parametres passats per $_POST a index.php
 * @param $sessio parametres emmagatzemats a la sessio actual
 * @param $enllacos model per treballar amb la taula enllac de la base de dades
 * @param $usuaris model per treballar amb la taula usuari de la base de dades
**/
function ctrlSetupForm($post, $sessio,$enllacos,$usuaris)
{
    //ENLLAÇOS

    $titolAux = $_POST["titol"];
    $enllacAux = $_POST["enllac"];
    $afegir = $_POST["afegir"];


    $sessio->set("error","");

    if(isAdmin($sessio->get("usuari")))
    {
        $usuari = $_POST["userSelection"];

        if($usuari == "-")
        {
            $sessio->set("error","Introdueix un usuari!!!");
            header("Location: index.php?r=setup");
            die();
        }
    }
    else 
    {
        $usuari = $sessio->get("usuari");
    }



    $userSQL = $usuaris->consult($usuari);

    $linkSelection = $post["linkSelection"];

    if($linkSelection != 0)
    {
        $usuaris->updateBackgroundImage($userSQL['nom'],$linkSelection);
    }

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