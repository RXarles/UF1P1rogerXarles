<?php

function ctrlSetupForm($post, $sessio)
{


    // IMATGE DE FONS
    if ((int)$_POST["linkSelection"] != 0) {
        $indexLink = (int)$_POST["linkSelection"];
        $link = $images[$indexLink]["link"];
    } 
    else {
        $link = $images[1]["link"];
    }

    //ENLLAÇOS

    if($_SESSION["logged"])
    {
        $titolAux = $_POST["titol"];
        $enllacAux = $_POST["enllac"];
        $afegir = $_POST["afegir"];


        $enllacos = 0;

        $enllacCookie;

        if (is_array($enllacAux) && is_array($afegir)) {
            for ($i = 0; $i < sizeOf($enllacAux); $i++) {
                if (!empty($titolAux[$i]) && validateURL($enllacAux[$i]) && in_array('afegir' . ($i + 1), $afegir)) {
                    if ($enllacos == 0) {
                        $enllacos = array();
                    }
                    
                    $titol = validateString($titolAux[$i]);

                    array_push($enllacos, array($titol,$enllacAux[$i]));

                    if (!isset($enllacCookie)) {
                        $enllacCookie = array();
                    }

                    array_push($enllacCookie, array($titol,$enllacAux[$i]));
                }
            }

            guardarCookie("enllacos", $enllacCookie);
        } else {
            $enllacCookie = llegirCookie("enllacos");
        }
    }
}