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
  <body style ="background-size: cover; background-image: url(<?=$linkImatge?>)">

    
    
    <div class="form2">
      <div class="form-group">
        <div>Benvingut <strong><?=$usuari?></strong></div>
      </div>
      <form action="index.php?r=logout" method="post">
        <button type="submit" class="btn btn-dark">Logout</button>
      </form>

      <?php if($displaySettings){ ?>
      <form action="index.php?r=setup" method="post">
        <input type="image" id="imageButton" src="./imatges/settings-icon.png" />
      </form>
      <?php }?>
    </div>
    
    <h1 class="text-center" >Com a casa enlloc!</h1>

    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="container">
                    <div class="row row-cols-3">
                      <?php for ($i = 0; $i < sizeof($linkEnllacos); $i++) { ?>
                            <div class="col"><a href= <?=$linkEnllacos[$i]["link"]?>><div class="m-3 p-2 bg-dark text-white"><?=$linkEnllacos[$i]["titol"]?> </div></a></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-4">
              <?php
                echo($calendari);
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