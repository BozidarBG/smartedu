<?php

namespace App\Controllers;

use App\Core\App;
use App\core\BaseController;
use App\app\models\User;

class UsersController extends BaseController
{
    /**
     * Show all users.
     */
    public function index()
    {
        $users = App::connection()->selectAll(User::getTable());

        return $this->view('users', compact('users'));
    }

//    public function index()
//    {
//        $users = User::selectAll();
//
//        return $this->view('users', compact('users'));
//    }

    /**
     * Store a new user in the database.
     */
    public function store()
    {
        App::connection()->insert('users', [
            'name' => $_POST['name']
        ]);

        return $this->redirect('users');
    }

    public function show($id){

        $user=App::connection()->selectOne('users', $id);

        //if user = false...
        if(!$user){
            die('nema');
        }
        return $this->view('user', compact('user'));
    }

    public function update($id)
    {
        App::connection()->update('users', [
            'name' => $_POST['name']
        ], $id);

        return $this->redirect('users');
    }
}
