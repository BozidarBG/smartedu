<?php
/**
 * Created by PhpStorm.
 * User: Bole
 * Date: 29.7.2019
 * Time: 21:39
 */

namespace App\core;


class BaseController
{

    /**
     * Require a view.
     *
     * @param  string $name
     * @param  array  $data
     */
    public function view($name, $data = [])
    {
        extract($data);

        return require "../app/views/{$name}.view.php";
    }

    public function redirect404(){
        return require "";
    }

}