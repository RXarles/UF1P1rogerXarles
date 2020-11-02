<?php

function creaCalendari($mes, $any, $festius)
{
    $nomMes = date("F", mktime(0, 0, 0, $mes, 10));

    return('<div class="container">
    <div class="row">
      <div class="span12 bg-gradient-light">
            <table class="table-condensed table-bordered table-striped table-light" style="text-align: center;">
                  <thead>
                      <tr>
                        <th colspan="7" >
                          <a class="btn"><i class="icon-chevron-left"></i></a>
                          <a class="btn">' . $nomMes . ' ' . $any . '</a>
                          <a class="btn"><i class="icon-chevron-right"></i></a>
                        </th>
                      </tr>
                      <tr>
                          <th>Dl</th>
                          <th>Dm</th>
                          <th>Dm</th>
                          <th>Dj</th>
                          <th>Dv</th>
                          <th>Ds</th>
                          <th>Dg</th>
                      </tr>
                  </thead>
                  <tbody>
                  ' . creaDies($mes, $any, $festius) . '
                  </tbody>
              </table>    
      </div>
    </div>
  </div>
  ');
}

function creaDies($mes, $any, $festius)
{
    $result = "";
    $nullDays = returnFirstDay($mes, $any);
    $day = 1;

    $d = new DateTime($any . '-' . $mes . '-1');
    $d = $d->format('t');

    while ($day < $d) {
        $result = $result . '<tr>';
        for ($j = 0; $j < 7; $j++) {
            if ($nullDays > 0 || $day > $d) {
                $result = $result . '<td>-</td>';
                $nullDays--;
            } else {
                if ($day == date('j')) {
                    $result = $result . '<td bgcolor="#000000"><font color="#FFFFFF">' . $day . '</font></td>';
                } elseif (isOnArray($festius, $day)) {
                    $result = $result . '<td bgcolor="#FF0000"><font color="#FFFFFF">' . $day . '</font></td>';
                } else {
                    $result = $result . '<td>' . $day . '</td>';
                }
                $day++;
            }
        }
        $result = $result . '</tr>';
    }

    return($result);
};

function isOnArray($festius, $dia)
{
    $res = false;
    foreach ($festius as $valor) {
        if ($valor == $dia) {
            $res = true;
        }
    }
    return $res;
}

function returnFirstDay($mes, $any)
{
    return date('N', strtotime(date($any . '-' . $mes . '-1'))) - 1;
}



function console_log($data)
{
    echo '<script>';
    echo 'console.log(' . json_encode($data) . ')';
    echo '</script>';
}


function guardarCookie($nom, $valor)
{
    $s = json_encode($valor);

    setcookie($nom, $s, strtotime("+1 month"));
}

function llegirCookie($str)
{
    return json_decode($_COOKIE[$str], true);
}


function comprovarUsuariContrasenya($usuari, $contrasenya)
{
    $sql = iniciarSQL();
    $users = array();
    $query = "select nom,contrasenya from usuari";
    foreach ($sql->query($query, PDO::FETCH_ASSOC) as $user) {
        array_push($users,$user);
    }

    for ($i = 0; $i < sizeof($users); $i++) {
        if ($usuari == $users[$i]["nom"] && $contrasenya == $users[$i]["contrasenya"]) {
            return true;
        }
    }
    
    return false;
}


function sendToLogin($error)
{
    header('Location: ../src/login.php');
    $_SESSION["error"] = $error;
    die();
}

// Retorna boolean
function validateURL($url)
{
    return filter_var($url, FILTER_VALIDATE_URL);
}

// Retorna string
function validateString($str)
{
    return trim(filter_var($str, FILTER_SANITIZE_STRING));
}


function iniciarSQL()
{
    $dsn = 'mysql:dbname=cae_daw;host=localhost';
    $admin = 'root';
    $clau = 'WhateverPassword';
    try {
        $sql = new PDO($dsn, $admin, $clau);
    } catch (PDOException $e) {
        die('Ha fallat la connexió: ' . $e->getMessage());
    }

    return $sql;
}