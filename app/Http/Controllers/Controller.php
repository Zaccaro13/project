<?php

namespace App\Http\Controllers;

class Controller
{
    public function mainPage()
    {
        return 'HELLO BUDDIES';
    }

    public function infoAboutMe()
    {
        return view('infoAboutMe');
    }
}
