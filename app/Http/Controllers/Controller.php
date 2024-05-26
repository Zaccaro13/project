<?php

namespace App\Http\Controllers;

class Controller
{
    public function mainPage()
    {
        return view('main');
    }

    public function infoAboutMe()
    {
        return view('infoAboutMe');
    }
}
