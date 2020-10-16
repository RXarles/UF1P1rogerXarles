<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <title>Login</title>

  </head>
  <body class="login">

  <?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);

    include 'config.php';
    include 'funcions.php';

    $error = $_GET["error"];
    $user = $_GET["user"];

    console_log($user);
  ?>

<form action="setup.php" method="post">
    <div class="container" style="display: flex; justify-content: center; align-items: center; height: 100vh">        <div class="form">
            <div class="form-group">

            <input name="usuari" type="text" class="form-control" id="inputUsuari" value="<?PHP echo $user; ?>" placeholder="Usuari"><br>

            <input name="contrasenya" type="password" class="form-control" id="inputContrasenya" placeholder="Contrasenya">
            </div>

            <?php if (isset($error)) {
                ?>
                <div class="alert alert-danger" role="alert">
                Error!!! Has introduit un usuari i contrasenya incorrectes.
                </div>
            <?php }?>

            <button type="submit" class="btn btn-primary">Enviar</button>

        </div>
    </div>
</form>
    <!-- Optional JavaScript -->


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>