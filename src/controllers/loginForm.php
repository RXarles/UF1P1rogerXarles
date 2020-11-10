<?php

/**
 * ctrlLogin:  Fa les comprovacions necessaries per saber si has introduit correctament usuari i contrasenya per saber si et pots loguejar o no
 *
 * @param $post parametres passats per $_POST a index.php
 * @param $sessio parametres emmagatzemats a la sessio actual
 * @param $sql PDO on es troba la base de dades amb la que comprovar
**/
function ctrlLoginForm($post, $sessio,$sql)
{
    if($post["usuari"] == "" || $post["contrasenya"] == "")
    {
        if($post["usuari"] == "")
        {
            $usuari = $sessio->set("usuari","");
        }
        else
        {
            $sessio->set("usuari",validateString($post["usuari"]));
        }

        $sessio->set("error","Has d'indicar usuari i contrasenya");
        header("Location: index.php?r=login");
        die();
    }

    $usuari = validateString($post["usuari"]);
    $sessio->set("usuari",$usuari);
    
    $contrasenya = validateString($post["contrasenya"]);

    if (comprovarUsuariContrasenya($usuari, $contrasenya,$sql) && !isDefault($usuari)) {
        $sessio->set("logged",true);
        header("Location: index.php?r=portada");
    }
    else{
        $sessio->set("error","Has introduit un usuari i contrasenya incorrectes");
        header("Location: index.php?r=login");
        die();
    }
}
