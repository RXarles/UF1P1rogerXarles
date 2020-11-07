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
    * Sessio: model que gestiona els usuaris.
    * @author: Roger Xarles rxarles@cendrassos.net
    *
    * Per guardar, recuperar i gestionar els usuaris.
    *
**/


class Usuaris
{
    private $sql = NULL;

    public function initialize($sql)
    {
        $this->sql = $sql;
    }


    public function insert($user)
    {
        $sql = $this->sql;

        $stm = $sql->prepare('insert into usuari (codi,nom,contrasenya,fonsindex) values (:codi,:nom,:contrasenya,:fonsIndex);');

        $stm->execute([':codi' => $user["codi"],':nom' => $user["nom"],':contrasenya' => $user["contrasenya"],':fonsIndex' => $user['fonsIndex']]);
    }

    public function delete($name)
    {
        $query = $this->sql->prepare('update usuari set borrat=1 where nom=:name;');
        $result = $query->execute([":name" => $name]);
    }

    public function restore($name)
    {
        $query = $this->sql->prepare('update usuari set borrat=0 where nom=:name;');
        $result = $query->execute([":name" => $name]);
    }

    public function consult($name)
    {
        $query = 'select codi,nom,contrasenya,fonsindex from usuari where nom="'.$name.'";';

        foreach($this->sql->query($query) as $user)
        {
            return [$user["codi"],$user["nom"],$user["contrasenya"],$user["fonsindex"]];
        }
    }

    public function list()
    {
        $query = 'select codi,nom,contrasenya,fonsindex from usuari;';

        $users = array();

        foreach($this->sql->query($query) as $user)
        {
            array_push($users,["codi"=>$user["codi"], "nom"=> $user["nom"], "contrasenya"=> $user["contrasenya"], "fonsindex"=>$user["fonsindex"]]);
        }

        return $users;
    }


    public function deleteTable()
    {

        $query = 'SET FOREIGN_KEY_CHECKS = 0;';
        $this->sql->query($query); 

        $query = 'truncate table usuari;';
        $this->sql->query($query); 

        $query = 'SET FOREIGN_KEY_CHECKS = 1;';
        $this->sql->query($query);    
    }
}