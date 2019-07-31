<?php
/**
 * Created by PhpStorm.
 * User: Bole
 * Date: 29.7.2019
 * Time: 22:59
 */

namespace App\app\models;


use App\core\BaseModel;

class User extends BaseModel
{

    public static $table='users';

    public static function getTable(){
        return self::$table;
    }




}