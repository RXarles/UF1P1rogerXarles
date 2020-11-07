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
    * Sessio: model que gestiona els enllaços.
    * @author: Roger Xarles rxarles@cendrassos.net
    *
    * Per guardar, recuperar i gestionar els enllaços.
    *
**/

// Esborrar tots els enllaços.


class Enllacos
{
    private $sql = NULL;

    public function initialize($sql)
    {
        $this->sql = $sql;
    }


    public function insert($enllac)
    {
        $sql = $this->sql;

        $stm = $sql->prepare('insert into enllac (codi,titol,link,codiusuari) values (:codi,:titol,:link,:codiUsuari);');

        $stm->execute([':codi' => $enllac['codi'],':titol' => $enllac['titol'],':link' => $enllac['link'],':codiUsuari' => $enllac['codiUsuari']]);
    }


    public function delete($id)
    {
        $query = $this->sql->prepare('delete from enllac where codi=:id;');
        $result = $query->execute([":id" => $id]);
    }

    public function deleteFromUser($id)
    {
        $query = $this->sql->prepare('delete from enllac where codiusuari=:id;');
        $result = $query->execute([":id" => $id]);
    }


    public function insertMultiple($enllacos)
    {
        $sql = $this->sql;

        $stm = $sql->prepare('insert into enllac (codi,titol,link,codiusuari) values (:codi,:titol,:link,:codiUsuari);');

        foreach($enllacos as $enllac)
        {
            $stm->execute([':codi' => $enllac['codi'],':titol' => $enllac['titol'],':link' => $enllac['link'],':codiUsuari' => $enllac['codiUsuari']]);
        }
    }
    
    public function consultFromUser($id)
    {

        $query = 'select codi,titol,link,codiusuari from enllac where codiusuari="'.$id.'";';

        $enllacos = array();

        foreach($this->sql->query($query) as $enllac)
        {
            array_push($enllacos,["codi"=>$enllac["codi"],"titol"=>$enllac["titol"],"link"=>$enllac["link"],"codiusuari"=>$enllac["codiusuari"]]);
        }

        return $enllacos;
    }

    public function deleteTable()
    {
        $query = 'truncate table enllac;';
        $this->sql->query($query); 

    }
}