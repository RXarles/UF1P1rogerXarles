<?php
/**
    * Sessio: model que gestiona els usuaris.
    * @author: Roger Xarles rxarles@cendrassos.net
    *
    * Per guardar, recuperar i gestionar els usuaris.
    *
**/

namespace Daw;

class Usuaris
{
    /**
     * $sql: Guarda la PDO de la base de dades amb la que treballem 
     *
    **/
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
     * insert:  Insereix un usuari a la base de dades
     *
     * @param $user array(codi,nom,contrasenya,fonsindex) que conte les dades de l'usuari a introduir.
    **/
    public function insert($user)
    {
        $sql = $this->sql;

        $stm = $sql->prepare('insert into usuari (codi,nom,contrasenya,fonsindex) values (:codi,:nom,:contrasenya,:fonsIndex);');

        $stm->execute([':codi' => $user["codi"],':nom' => $user["nom"],':contrasenya' => $user["contrasenya"],':fonsIndex' => $user['fonsIndex']]);
    }

    /**
     * delete:  Marca un usuari per esborrar-lo de la base de dades
     *
     * @param $name string que conte el nom de l'usuari a marcar.
    **/
    public function delete($name)
    {
        $query = $this->sql->prepare('update usuari set borrat=1 where nom=:name;');
        $result = $query->execute([":name" => $name]);
    }

    /**
     * restore:  Desmarca un usuari per esborrar-lo de la base de dades
     *
     * @param $name string que conte el nom de l'usuari a desmarcar.
    **/
    public function restore($name)
    {
        $query = $this->sql->prepare('update usuari set borrat=0 where nom=:name;');
        $result = $query->execute([":name" => $name]);
    }

    /**
     * updateBackgroundImage:  Canvia el fons de pantalla d'un usuari
     *
     * @param $name string que conte el nom de l'usuari a editar.
     * @param $image integer que conte el nom de l'index de la imatge de fons.
    **/
    public function updateBackgroundImage($name,$image)
    {
        $query = $this->sql->prepare('update usuari set fonsindex=:image where nom=:name;');
        $result = $query->execute([":name" => $name,":image" => $image]);
    }

    /**
     * consult:  Retorna totes les dades d'un usuari
     *
     * @param $name string que conte el nom de l'usuari a consultar.
    **/
    public function consult($name)
    {
        $query = 'select codi,nom,contrasenya,fonsindex from usuari where nom="'.$name.'";';

        foreach($this->sql->query($query) as $user)
        {
            return ["codi"=>$user["codi"], "nom"=> $user["nom"], "contrasenya"=> $user["contrasenya"], "fonsindex"=>$user["fonsindex"]];
        }
        
    }

    /**
     * list:  Retorna una array amb tots els usuaris i les seves dades
     *
    **/
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

    /**
     * deleteTable:  Esborra totes les dades de la taula usuari
     *
    **/
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