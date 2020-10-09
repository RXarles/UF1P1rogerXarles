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

    <?php
  include 'config.php';

  if((int)$_POST["linkSelection"]!=0)
  {
    $indexLink = (int)$_POST["linkSelection"];
  }
  else
  {
    $indexLink = 1;
  }

  $titolAux = $_POST["titol"];
  $enllacAux = $_POST["enllac"];

  $enllacos = 0;
  for($i = 0;$i<sizeOf($enllacAux);$i++)
  {
    if(!empty($titolAux[$i]) && !empty($enllacAux[$i]))
    {
      if($enllacos == 0) $enllacos = array();
      $enllacos[$i] = array($titolAux[$i],$enllacAux[$i]);
    }
  }

 
    ?>
  </head>
  <body <?php 

  echo(' style ="background-size: cover; background-image: url('.$images[$indexLink]["link"].') "')?>>
    
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
                      ?>
                    </div>
                </div>
            </div>
            <div class="col-4">
              <?php
                include 'funcions.php';
                echo(creaCalendari(date('n'),array(12)));
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