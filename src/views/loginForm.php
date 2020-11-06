<?php
include "../src/config.php";
include "../src/funcions.php";

function ctrlLoginForm($post, $sessio)
{
    if($post["usuari"] == "" || $post["contrasenya"] == "")
    {
        $sessio->set("usuari",""); // NO FUNCIONA (?)
        $sessio->set("error","Has d'indicar usuari i contrasenya");
        header("Location: index.php?r=login");
        die();
    }

    $usuari = validateString($post["usuari"]);
    $sessio->set("usuari",$usuari);
    
    $contrasenya = validateString($post["contrasenya"]);

    if (comprovarUsuariContrasenya($usuari, $contrasenya)) {
        $sessio->set("logged",true);
        header("Location: index.php?r=portada");
        die();
    }
    else{
        $sessio->set("error","Has introduit un usuari i contrasenya incorrectes");
        header("Location: index.php?r=login");
        die();
    }
}
