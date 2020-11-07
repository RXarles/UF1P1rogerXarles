<?php
/**
    * Fitxer que afegeix usuaris i links per defecte a la base de dades
    * @author: Roger Xarles rxarles@cendrassos.net
    *
**/

//error_reporting(E_ERROR | E_WARNING | E_PARSE);

include "../src/config.php";
include "../src/funcions.php";


$sql = iniciaSQL();

$usuaris = new Daw\Usuaris();
$usuaris->initialize($sql);

$enllacos = new Daw\Enllacos();
$enllacos->initialize($sql);



// 1.BORREM ENLLAÇ
$enllacos->deleteTable();


// 2.BORREM USUARI
$usuaris->deleteTable();



// 3.AFEGIM ELS USUARIS
foreach ($usuarisInicials as $input)
{
    $usuaris->insert($input);
}


// 4.AFEGIM ELS LINKS

$enllacos->insertMultiple($linksInicials);



print_r("S'han reiniciat els usuaris i links");
?>