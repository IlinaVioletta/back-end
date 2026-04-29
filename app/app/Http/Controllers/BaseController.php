<?php

namespace App\Http\Controllers;

abstract class BaseController
{
    protected function render(string $view, array $arguments = [])
    {
        return view($view, $arguments);
    }
}