<?php
    session_start();
    
    include '../src/config.php';
    include '../src/funcions.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST["usuari"]) || empty($_POST["contrasenya"])) {
        sendToLogin("Has d'indicar usuari i contrasenya");
    }

    $usuari = validateString($_POST["usuari"]);
    $_SESSION["usuari"] = $usuari;
    if (comprovarUsuariContrasenya($usuari, $_POST["contrasenya"])) {
        $_SESSION["logged"] = true;
        $_SESSION["usuari"] = $usuari;
    }
    {
    sendToLogin("Has introduit un usuari i contrasenya incorrectes");
    }
} elseif (is_null($_SESSION["logged"])) {
    sendToLogin("Has d'iniciar sessió");
}

  $usuari = $_SESSION["usuari"];

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
    <title>Enllaços</title>

  </head>
  <body class="setup">

  

  <div class="form2">
    <div class="form-group">
      <div>Benvingut <strong><?=$usuari?></strong></div>
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

            for ($i = 0; $i < $numEnllacos; $i++) {
                echo('
            <div class="form">
              <div class="form-group">
                <label for="inputTitol' . ($i + 1) . '">Titol' . ($i + 1) . '</label>
                <input name="titol[]" type="text" class="form-control" id="inputTitol' . ($i + 1) . '" placeholder="El teu titol">

                <label for="inputEnllac' . ($i + 1) . '">Enllaç' . ($i + 1) . '</label>
                <input name="enllac[]" type="text" class="form-control" id="inputEnllac' . ($i + 1) . '" placeholder="El teu enllaç">

                <br><input name="afegir[]" type="checkbox" value="afegir' . ($i + 1) . '">Afegir enllaç<br>

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
