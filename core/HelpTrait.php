<?php
/**
 * Created by PhpStorm.
 * User: Bole
 * Date: 29.7.2019
 * Time: 21:45
 */

namespace App\core;


trait HelpTrait
{
    public function redirect($path)
    {
        header("Location: /{$path}");
    }

    public function checkIfInteger($value){
        return is_int(trim( (int) $value));
    }

    public function redirectBack()
    {
        $uri = $_SERVER['REQUEST_URI'];
        header("location: $uri");
    }


}