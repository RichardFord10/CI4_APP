<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function hello()
    {
        return view('hello');
    }
}
