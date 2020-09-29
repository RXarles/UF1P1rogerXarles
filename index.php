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
    $images = array(
      1=> 'https://cdn.pixabay.com/photo/2020/09/11/00/11/landscape-5561678_960_720.jpg',
      2=> 'https://cdn.pixabay.com/photo/2017/01/20/00/30/maldives-1993704_960_720.jpg',
      3=> 'https://cdn.pixabay.com/photo/2016/02/19/10/10/city-1209105_960_720.jpg',
      4=> 'https://cdn.pixabay.com/photo/2018/08/14/13/23/ocean-3605547_960_720.jpg'
    );
    ?>
  </head>
  <body <?php echo(' style ="background-image: url('.$images[3].')"')?>>

    
    <h1 class="text-center" >Com a casa enlloc!</h1>


    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="container">
                    <div class="row row-cols-3">
                      <?php

                      $numEnllacos = 7;

                      for($i = 1;$i<=$numEnllacos;$i++)
                      {
                        echo('<div class="col"><div class="m-3 p-2 bg-dark text-white">Enllaç '.$i.' </div></div>'); 
                      }
                      ?>
                    </div>
                </div>
            </div>
            <div class="col-4">CALENDARI</div>
        </div>
    </div>

    <!-- Optional JavaScript -->


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>