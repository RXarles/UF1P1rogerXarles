<?php
  error_reporting(E_ERROR | E_WARNING | E_PARSE);

  include 'config.php';
  include 'funcions.php';


  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  }
  else
  {
  }


  // IMATGE DE FONS

  if((int)$_POST["linkSelection"]!=0)
  {
    $indexLink = (int)$_POST["linkSelection"];
    $link = $images[$indexLink]["link"];

  }
  else if(!is_null($_FILES['fitxer_usuari']))
  {

    $fitxer = $_FILES['fitxer_usuari'];
    $midaMaxima = 1000000; // en bits

    if($fitxer['error']>0 || $fitxer['size'] > $midaMaxima) 
    {
      $link = $images[1]["link"];
    }
    else
    {
      $link = './imatges/'.$fitxer['name'];   
      move_uploaded_file($fitxer['tmp_name'], $link);
    }
  }
  else
  {
    $link = $images[1]["link"];
  }

  //ENLLAÇOS

  $titolAux = $_POST["titol"];
  $enllacAux = $_POST["enllac"];
  $afegir = $_POST["afegir"];


  $enllacos = 0;

  $enllacCookie;

  if(is_array($enllacAux) && is_array($afegir)){
    for($i = 0;$i<sizeOf($enllacAux);$i++)
    {
      if(!empty($titolAux[$i]) && filter_var($enllacAux[$i], FILTER_VALIDATE_URL) && in_array('afegir'.($i+1), $afegir))
      {
        if($enllacos == 0) $enllacos = array();

        $titol = trim(filter_var($titolAux[$i], FILTER_SANITIZE_STRING));

        array_push($enllacos, array($titol,$enllacAux[$i]));

        if(!isset($enllacCookie)) {$enllacCookie = array();}

        array_push($enllacCookie,array($titol,$enllacAux[$i]));
      }
    }

    guardarCookie("enllacos",$enllacCookie);
  }
  else
  {
    $enllacCookie = llegirCookie("enllacos");
  }
    ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">

    <title>Com a casa enlloc!</title>

    
  </head>
  <body <?php 
  echo(' style ="background-size: cover; background-image: url('.$link.') "');
  ?>>
    
    <h1 class="text-center" >Com a casa enlloc!</h1>

    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="container">
                    <div class="row row-cols-3">
                      <?php
                      
                      for($i = 0;$i<sizeof($links);$i++)
                      {
                        echo('<div class="col"><a href="'.$links[$i][1].'"><div class="m-3 p-2 bg-dark text-white">'.$links[$i][0].' </div></a></div>'); 
                      }


                      if($enllacos != 0)
                      {
                        for($i = 0;$i<sizeof($enllacos);$i++)
                        {
                          echo('<div class="col"><a href="'.$enllacos[$i][1].'"><div class="m-3 p-2 bg-dark text-white">'.$enllacos[$i][0].' </div></a></div>'); 
                        }
                      }
                      else if(isset($enllacCookie))
                      {
                        for($i = 0;$i<sizeof($enllacCookie);$i++)
                        {
                          echo('<div class="col"><a href="'.$enllacCookie[$i][1].'"><div class="m-3 p-2 bg-dark text-white">'.$enllacCookie[$i][0].' </div></a></div>'); 
                        }
                      }
                      ?>
                    </div>
                </div>
            </div>
            <div class="col-4">
              <?php
                echo(creaCalendari(date('n'),date('Y'),array(12)));
              ?>
            </div>
        </div>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>