<?php

function ctrlLogout($sessio)
{
    $sessio->set("logged",false);
    $sessio->set("enllacos",NULL);
    $sessio->set("link",NULL); 
    
    header("Location: index.php?r=login");
}