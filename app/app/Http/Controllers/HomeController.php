<?php

namespace App\Http\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        return $this->renderView();
    }

    public function renderView(array $arguments = [])
    {
        return $this->render('home', $arguments);
    }
}