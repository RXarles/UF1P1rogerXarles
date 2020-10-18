<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <title>Enllaços</title>

  </head>
  <body class="setup">

  <?php
    include 'config.php';
    include 'funcions.php';


    session_start();

    if(empty($_POST["usuari"]) && is_null($_SESSION["logged"]))
    {
      header('Location: login.php');
      die();
    }



    if(empty($_POST["usuari"]))
    {
      $usuari = "";
    }
    else
    {
      $usuari = $_POST["usuari"];
    }

    if(empty($_POST["contrasenya"]))
    {
      $contrasenya = "";
    }
    else
    {
      $contrasenya = $_POST["contrasenya"];
    }

    
    if (!comprovarUsuariContrasenya($usuari,$contrasenya,$usuaris) && $usuari != "" && $contrasenya != "") {
        header('Location: login.php?error=1&&user='.$usuari);
        die();
    }

    if(is_null($_SESSION["usuari"]))
    {
      $_SESSION["usuari"]=$usuari;
    }

    $_SESSION["logged"]=true;

  ?>

  <div class="form2">
    <div class="form-group">
      <div><?php echo("Benvingut <strong>".$_SESSION["usuari"]."</strong>")?></div>
    </div>
  </div>

  <form action="index.php" enctype="multipart/form-data" method="post">

        <div class="form">
          <div class="form-group">
            <label for="selectLink">Quin fons de pantalla vols</label>
            <select name="linkSelection" class="form-control" id="selectLink">
              <option>-</option>
                <?php

                foreach ($images as $codi => $link) {
                ?>
              <option value="<?=$codi;?>"><?=$link["nom"];?></option>
                <?php }?>
            </select>
          </div>
        </div>


        <div class="form">
          <div class="form-group">

            Enviar aquest fitxer: <input name="fitxer_usuari" type="file" />

          </div>
        </div>


          <?php

          
          
          $numEnllacos = 2;

          for($i = 0;$i<$numEnllacos;$i++)
          {
            echo('
            <div class="form">
              <div class="form-group">
                <label for="inputTitol'.($i+1).'">Titol'.($i+1).'</label>
                <input name="titol[]" type="text" class="form-control" id="inputTitol'.($i+1).'" placeholder="El teu titol">

                <label for="inputEnllac'.($i+1).'">Enllaç'.($i+1).'</label>
                <input name="enllac[]" type="text" class="form-control" id="inputEnllac'.($i+1).'" placeholder="El teu enllaç">

                <br><input name="afegir[]" type="checkbox" value="afegir'.($i+1).'">Afegir enllaç<br>

              </div>
            </div>
            ');
          }

          

          ?>
        
          <button type="submit" class="btn btn-primary">Enviar</button>
</form>

    <!-- Optional JavaScript -->


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>