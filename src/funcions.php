<?php

    /**
     * creaCalendari:  Retorna un string que conte el codi HTML per fer un calendari
     * 
     * Crea la taula i les dades basiques
     *
     * @param $mes integer que conte el index del mes del any que mostrara el calendari.
     * @param $any integer que conte l'any que mostrara el calendari en format YYYY.
     * @param $festius array de integers que conte els dies festius del mes.
    **/
    function creaCalendari ($mes, $any, $festius)
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

    /**
     * creaDies:  Retorna un string que conte el codi HTML per inserir els dies al calendari
     *
     * @param $mes integer que conte el index del mes del any que mostrara el calendari.
     * @param $any integer que conte l'any que mostrara el calendari en format YYYY.
     * @param $festius array de integers que conte els dies festius del mes.
    **/
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


    /**
     * isOnArray:  Retorna un boolea per si una array conte un valor
     *
     * @param $festius array de integers que conte l'array que es vol comprovar.
     * @param $dia integer que conte el valor que es vol comprovar.
    **/
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


    /**
     * returnFirstDay:  Retorna el index del dia de la setmana que es el numero 1 del mes
     *
     * @param $mes integer que conte el index del mes del any que mostrara el calendari.
     * @param $any integer que conte l'any que mostrara el calendari en format YYYY.
    **/
    function returnFirstDay($mes, $any)
    {
        return date('N', strtotime(date($any . '-' . $mes . '-1'))) - 1;
    }


    /**
     * console_log:  Imprimeix per consola un valor
     *
     * @param $data valor que imprimeix per consola.
    **/
    function console_log($data)
    {
        echo '<script>';
        echo 'console.log(' . json_encode($data) . ')';
        echo '</script>';
    }

    /**
     * guardarCookie:  Crea una cookie i hi guarada un valor codificat amb el json
     *
     * @param $nom nom de la cookie
     * @param $valor valor que guarda la cookie
    **/
    function guardarCookie($nom, $valor)
    {
        $s = json_encode($valor);

        setcookie($nom, $s, strtotime("+1 month"));
    }

    /**
     * llegirCookie:  Retorn el valor que conte una cookie
     *
     * @param $str nom de la cookie
    **/
    function llegirCookie($str)
    {
        return json_decode($_COOKIE[$str], true);
    }

    /**
     * iniciaSQL:  Retorn una PDO amb la base de dades iniciada
     *
    **/
    function iniciaSQL()
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

    /**
     * comprovarUsuariContrasenya:  Comprova si coincideix un usari amb la seva contrasenya de la base de dades
     *
     * @param $usuari string amb el nom d'usuari
     * @param $contrasenya string amb la contrasenya de l'usuari
     * @param $sql PDO amb la base de dades on es comproba
    **/
    function comprovarUsuariContrasenya($usuari, $contrasenya,$sql)
    {
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

    /**
     * validateURL:  Retorna true si la url que li passem es valida i false si no ho es
     *
     * @param $url string amb la url a validar
    **/    
    function validateURL($url)
    {
        return filter_var($url, FILTER_VALIDATE_URL);
    }

    /**
     * validateString:  Retorna un string que no tingui elements maliciosos
     *
     * @param $str string per comprovar
    **/   
    function validateString($str)
    {
        return trim(filter_var($str, FILTER_SANITIZE_STRING));
    }


    /**
     * isDefault:  Retorna true si el nom d'usuari que li passem correspont amb el que te predefinit (generic)
     *
     * @param $user string amb l'usuari a comprovar
    **/   
    function isDefault($user)
    {
        if($user == 'generic')
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * isAdmin:  Retorna true si el nom d'usuari que li passem correspont amb el que te predefinit (admin)
     *
     * @param $user string amb l'usuari a comprovar
    **/   
    function isAdmin($user)
    {
        if($user == 'admin')
        {
            return true;
        }
        else
        {
            return false;
    }
}