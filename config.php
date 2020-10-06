<?php

$images = array(
    1=> 'https://cdn.pixabay.com/photo/2020/09/11/00/11/landscape-5561678_960_720.jpg',
    2=> 'https://cdn.pixabay.com/photo/2017/01/20/00/30/maldives-1993704_960_720.jpg',
    3=> 'https://cdn.pixabay.com/photo/2016/02/19/10/10/city-1209105_960_720.jpg',
    4=> 'https://cdn.pixabay.com/photo/2018/08/14/13/23/ocean-3605547_960_720.jpg',
    5=> 'https://cdn.pixabay.com/photo/2020/06/15/17/10/ancient-5302626_960_720.jpg',
    6=> 'https://cdn.pixabay.com/photo/2020/06/21/22/20/deer-5326958_960_720.jpg',
  );

$enllac = 'http://localhost/ComACasaEnlloc/index.php?fons='; 

for($i = 1;$i<=sizeof($images);$i++)
    {
        $imatgeLink[$i]=$enllac.$i;
    }

$links = array(
   array("Correu","https:\\gmail.com"),
   array("Institud","https:\\cendrassos.net"),
   array("Moodle","https:\\moodle.cendrassos.net"),
   array("Pràctica","https://docs.google.com/document/d/1T-9JPf26BGGyfVmZJScdddOmpnXF6vCHDsVGEzfH_rM/edit#"),
   array("Github","https://github.com/daw-cendrassos-2021"),
   array("Github de la practica","https://github.com/RXarles/UF1P1rogerXarles")
);