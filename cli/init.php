<?php
/**
    * Fitxer que afegeix usuaris i links per defecte a la base de dades
    * @author: Roger Xarles rxarles@cendrassos.net
    *
    * Afegeix una tasca i redirigeix a la portada
    *
**/

error_reporting(E_ERROR | E_WARNING | E_PARSE);

include "../src/config.php";
include "../src/funcions.php";
$exemples = array();

$sql = iniciarSQL();


// 1.BORREM ENLLAÇ
$query = 'truncate table enllac;';
$sql->query($query);


// 2.BORREM USUARI
$query = 'truncate table usuari;';
$sql->query($query);


print_r("S'han reiniciat els usuaris i links a: <br><br><br>"); // PRINT

print_r("---USUARIS---<br>"); // PRINT
// 3.AFEGIM ELS USUARIS
$stm = $sql->prepare('insert into usuari (codi,nom,contrasenya,fonsindex) values (:codi,:nom,:contrasenya,:fonsIndex);');

foreach ($usuarisInicials as $input)
{
    $result = $stm->execute([':codi' => $input["codi"],':nom' => $input["nom"],':contrasenya' => $input["contrasenya"],':fonsIndex' => $input['fonsIndex']]);
    print_r($input); // PRINT
    print_r("<br>"); // PRINT
}

print_r("<br>---LINKS---<br>"); // PRINT


// 4.AFEGIM ELS LINKS
$stm = $sql->prepare('insert into enllac (codi,titol,link,codiusuari) values (:codi,:titol,:link,:codiUsuari);');

foreach ($linksInicials as $input)
{
    $result = $stm->execute([':codi' => $input['codi'],':titol' => $input['titol'],':link' => $input['link'],':codiUsuari' => $input['codiUsuari']]);
    print_r($input); // PRINT
    print_r("<br>"); // PRINT
}

?>