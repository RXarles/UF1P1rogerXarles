<?php
/**
    * Exemple per a M07.
    * @author: Roger Xarles rxarles@cendrassos.net
    *
    * Model que gestiona la sessió.
    *
**/

namespace Daw;

/**
    * Sessio: model que gestiona la sessió.
    * @author: Roger Xarles rxarles@cendrassos.net
    *
    * Per guardar, recuperar i gestionar la sessió.
    *
**/
class Sessio
{

    /**
     * __construct:  Crear el model sessio
     *
    **/
    public function __construct()
    {
        session_start();
    }

    /**
      * get:  obté un valor de la sessió
      *
      * @param $tasca string amb la tasca.
      *
    **/
    public function get($id)
    {
        return $_SESSION[$id];
    }

    /**
      * set:  guarda un valor a la sessió
      *
      * guarda el valor a la sessió
      *
      * @param $id integer identificador de la tasca que volem esborrar.
      *
    **/
    public function set($id, $value)
    {
        $_SESSION[$id] = $value;
    }
}