<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index(): string
    {
        $cabecera = ['titulo'=>'Home','tipo'=>'Home'];
        return view('Admin/home',$cabecera);
    }
}
