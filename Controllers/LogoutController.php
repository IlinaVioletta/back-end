<?php

namespace guestbook\Controllers;

class LogoutController
{
    public function execute()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        session_destroy();

        header('Location: /');
        exit;
    }
}