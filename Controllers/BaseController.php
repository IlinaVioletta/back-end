<?php

namespace guestbook\Controllers;

abstract class BaseController
{
    protected function render(string $view, array $arguments = [])
    {
        extract($arguments);
        require __DIR__ . '/../Views/' . $view . '.php';
    }
}