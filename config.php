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
        $links[$i]=$enllac.$i;
    }

