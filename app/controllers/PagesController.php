<?php

namespace App\Controllers;

use App\core\BaseController;

class PagesController extends BaseController
{
    /**
     * Show the home page.
     */
    public function home()
    {
        return $this->view('index');
    }

    /**
     * Show the about page.
     */
    public function about()
    {
        $company = 'Laracasts';

        return $this->view('about', ['company' => $company]);
    }

    /**
     * Show the contact page.
     */
    public function contact()
    {
        return $this->view('contact');
    }
}
