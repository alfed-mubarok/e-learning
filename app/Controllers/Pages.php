<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = ['title' => 'Log in'];
        return view('Pages/Login', $data);
    }
    public function register()
    {
        $data = ['title' => 'Register'];
        return view('Pages/register', $data);
    }
    public function about()
    {
        $data = ['title' => 'About'];
        return view('Pages/about', $data);
    }
}
