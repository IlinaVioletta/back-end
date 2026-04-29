<?php

namespace App\Http\Controllers;

class LogoutController extends BaseController
{
    public function index()
    {
        session()->flush();
        return redirect()->route('home');
    }
}