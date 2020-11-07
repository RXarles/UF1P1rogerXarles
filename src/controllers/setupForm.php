<?php

function ctrlSetupForm($post, $sessio)
{
    // IMATGE DE FONS
    if ((int)$_POST["linkSelection"] != 0) {
        $sessio->set("link",(int)$_POST["linkSelection"]); // CANVIAR AL PAS 4
    } 

    //ENLLAÇOS

    $titolAux = $_POST["titol"];
    $enllacAux = $_POST["enllac"];
    $afegir = $_POST["afegir"];


    $enllac = 0;

    if (is_array($enllacAux) && is_array($afegir)) {
        for ($i = 0; $i < sizeOf($enllacAux); $i++) {
            if (!empty($titolAux[$i]) && validateURL($enllacAux[$i]) && in_array('afegir' . ($i + 1), $afegir)) {
                if ($enllac == 0) {
                    $enllac = array();
                }
                
                $titol = validateString($titolAux[$i]);

                array_push($enllac, array("titol" => $titol, "link"=> $enllacAux[$i]));

            }
        }

        $sessio->set("enllacos",$enllac);
    } 

    header("Location: index.php?r=portada");


}