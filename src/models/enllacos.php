<?php
/**
    * Exemple per a M07.
    * @author: Roger Xarles rxarles@cendrassos.net
    *
    * Per guardar, recuperar i gestionar els enllacos.
    *
**/

namespace Daw;

class Enllacos
{
    private $sql = NULL;

    /**
     * initialize:  Crea la PDO amb que treballara la classe
     *
     * @param $sql PDO amb la que treballara la classe.
    **/
    public function initialize($sql)
    {
        $this->sql = $sql;
    }


    /**
     * insert:  Insereix un enllaç a la base de dades
     *
     * @param $enllac array(codi,titol,link,codiusuari) que conte les dades de l'enllaç a introduir.
    **/
    public function insert($enllac)
    {
        $sql = $this->sql;

        $stm = $sql->prepare('insert into enllac (codi,titol,link,codiusuari) values (:codi,:titol,:link,:codiUsuari);');

        $stm->execute([':codi' => $enllac['codi'],':titol' => $enllac['titol'],':link' => $enllac['link'],':codiUsuari' => $enllac['codiUsuari']]);
    }


    /**
     * delete:  Esborra un enllaç de la base de dades
     *
     * @param $id integer que conte el codi de l'enllaç a esborrar.
    **/
    public function delete($id)
    {
        $query = $this->sql->prepare('delete from enllac where codi=:id;');
        $result = $query->execute([":id" => $id]);
    }

    /**
     * deleteFromUser:  Esborra els enllaços d'un usuari de la base de dades
     *
     * @param $id integer que conte el codi de l'usuari a esborrar els enllaços.
    **/
    public function deleteFromUser($id)
    {
        $query = $this->sql->prepare('delete from enllac where codiusuari=:id;');
        $result = $query->execute([":id" => $id]);
    }

    /**
     * insertMultiple:  Insereix una array de ennlaços a la base de dades
     *
     * @param $enllacos array que conte arrays amb l'informacio dels enllaços.
    **/
    public function insertMultiple($enllacos)
    {
        $sql = $this->sql;

        $stm = $sql->prepare('insert into enllac (codi,titol,link,codiusuari) values (:codi,:titol,:link,:codiUsuari);');

        foreach($enllacos as $enllac)
        {
            $stm->execute([':codi' => $enllac['codi'],':titol' => $enllac['titol'],':link' => $enllac['link'],':codiUsuari' => $enllac['codiUsuari']]);
        }
    }
    
    /**
     * consultFromUser:  Retorna una array d'arrays amb tots els enllaços d'un usuari
     *
     * @param $id integer que conte el numero de l'usuari.
    **/
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

    /**
     * deleteTable:  Esborra totes les dades de la taula enllac
     *
    **/
    public function deleteTable()
    {
        $query = 'truncate table enllac;';
        $this->sql->query($query); 

    }
}