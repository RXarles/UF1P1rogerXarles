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
    <form action="index.php?r=logout" method="post">
      <button type="submit" class="btn btn-dark">Logout</button>
    </form>
    <form action="index.php?r=portada" method="post">
        <input type="image" id="imageButton" src="./imatges/home-icon.png" />
      </form>
  </div>


  <form action="index.php?r=setupForm" enctype="multipart/form-data" method="post">
        
        <?php if($admin){?>
          <div class="form">
            <div class="form-group">
              <label for="selectUser">Quin usuari vols modificar</label>
              <select name="userSelection" class="form-control" id="selectUser">
                <option>-</option>
                  <?php
                  foreach ($usuarisPerConfigurar as $codi => $link) {
                      ?>
                <option value="<?=$link["nom"];?>"><?=$link["nom"];?></option>
                  <?php }?>
              </select>
            </div>
            <?php if ($error != "") {
                  ?>
                  <div class="alert alert-danger" role="alert"><?=$error;?></div>
          <?php }?>
          </div>
        <?php }?>

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
          <?php
            for ($i = 1; $i <= $numEnllacos; $i++) {?>
            <div class="form">
              <div class="form-group">
                <label for="inputTitol <?=$i?>">Titol <?=$i?></label>
                <input name="titol[]" type="text" class="form-control" id="inputTitol <?=$i?>" placeholder="El teu titol">

                <label for="inputEnllac<?=$i?>">Enllaç <?=$i?></label>
                <input name="enllac[]" type="text" class="form-control" id="inputEnllac<?=$i?>" placeholder="El teu enllaç">

                <br><input name="afegir[]" type="checkbox" value="afegir<?=$i?>">Afegir enllaç<br>

              </div>
            </div>

            <?php } ?>
        
          <button type="submit" class="btn btn-primary">Enviar</button>
  </form>

    <!-- Optional JavaScript -->


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
