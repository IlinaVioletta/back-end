<?php

namespace guestbook\Controllers;

use guestbook\Models\User;

class RegisterController extends BaseController
{
    public function execute()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (!empty($_SESSION['auth'])) {
            header('Location: /guestbook');
            exit;
        }

        $infoMessage = '';

        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            if (User::findByEmail($email)) {
                $infoMessage = 'Такий користувач вже існує! <a href="/login">Увійти</a>';
            } else {
                User::create($email, $password);
                header('Location: /login');
                exit;
            }
        } elseif (!empty($_POST)) {
            $infoMessage = 'Заповніть форму реєстрації!';
        }

        $this->renderView([
            'infoMessage' => $infoMessage,
        ]);
    }

    public function renderView(array $arguments = [])
    {
        $this->render('registerView', $arguments);
    }
}