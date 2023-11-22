<?php
namespace App\Models;

use App\Models\AbstractManager;
use App\Services\Database;
use App\Models\User;

class UserManager extends AbstractManager
{

    public function __construct(){
        self::$db = new Database();
        self::$tableName = 'user';
        self::$obj = new User();
    }

    public function getUserByEmail($email = null):array | false //retourne un tableau contenant les informations de l'utilisateur correspondant à l'email (soit cela retourne array soit "false" si pas trouvé en rajoutant | false au lieu d'une "fatal error")
    {
        $whereEmail = !is_null($email) ? "WHERE email=?" : ""; 
        $row = [];
        $row = self::$db->select("SELECT * from ".self::$tableName." " . $whereEmail . "LIMIT 1", [$email]);
        return $row; //retourne qu'une seule ligne de tableau
    }



}