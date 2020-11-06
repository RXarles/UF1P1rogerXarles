<?php

function ctrlLoginForm($post, $sessio,$sql)
{
    if($post["usuari"] == "" || $post["contrasenya"] == "")
    {
        $usuari = $sessio->set("usuari","");
        $sessio->set("error","Has d'indicar usuari i contrasenya");
        header("Location: index.php?r=login");
        die();
    }

    $usuari = validateString($post["usuari"]);
    $sessio->set("usuari",$usuari);
    
    $contrasenya = validateString($post["contrasenya"]);

    if (comprovarUsuariContrasenya($usuari, $contrasenya,$sql)) {
        $sessio->set("logged",true);
        header("Location: index.php?r=portada");
    }
    else{
        $sessio->set("error","Has introduit un usuari i contrasenya incorrectes");
        header("Location: index.php?r=login");
        die();
    }
}
