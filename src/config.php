<?php
require_once "../src/models/sessio.php";
require_once "../src/models/imatges.php";


$imatges = array(
    1 => array("nom" => "Muntanya", "link" => 'https://cdn.pixabay.com/photo/2020/09/11/00/11/landscape-5561678_960_720.jpg'),
    2 => array("nom" => "Platja", "link" => 'https://cdn.pixabay.com/photo/2017/01/20/00/30/maldives-1993704_960_720.jpg'),
    3 => array("nom" => "Skyline", "link" => 'https://cdn.pixabay.com/photo/2016/02/19/10/10/city-1209105_960_720.jpg'),
    4 => array("nom" => "Cel estrellat", "link" => 'https://cdn.pixabay.com/photo/2018/08/14/13/23/ocean-3605547_960_720.jpg'),
    5 => array("nom" => "Ciutat", "link" => 'https://cdn.pixabay.com/photo/2020/06/15/17/10/ancient-5302626_960_720.jpg'),
    6 => array("nom" => "Natura", "link" => 'https://cdn.pixabay.com/photo/2020/06/21/22/20/deer-5326958_960_720.jpg'),
  );

$linksInicials = array(
  array("codi" => 1, "titol"=>"Google","link"=>"https://www.google.com/","codiUsuari"=>1),
  array("codi" => 2, "titol"=>"Youtube","link"=>"https://www.youtube.com/?hl=ca&gl=ES","codiUsuari"=>1),
  array("codi" => 3, "titol"=>"Moodle","link"=>"https://moodle.cendrassos.net/","codiUsuari"=>1),
);

$usuarisInicials = array(
  array("codi" => 1, "nom" =>  "Guest","contrasenya" =>"1234","fonsIndex"=>1),
  array("codi" => 2, "nom" =>  "usuari1","contrasenya" =>"1234","fonsIndex"=>2),
  array("codi" => 3, "nom" =>  "usuari2","contrasenya" =>"1234","fonsIndex"=>3),
  array("codi" => 4, "nom" =>  "usuari3","contrasenya" =>"1234","fonsIndex"=>4),
  array("codi" => 5, "nom" =>  "usuari4","contrasenya" =>"1234","fonsIndex"=>5),
  array("codi" => 6, "nom" =>  "usuari5","contrasenya" =>"1234","fonsIndex"=>6),
);

