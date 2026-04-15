<?php

namespace guestbook\Controllers;

use guestbook\Models\User;

class LoginController extends BaseController
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

            $user = User::findByEmailAndPassword($email, $password);

            if ($user) {
                $_SESSION['auth'] = true;
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];

                header('Location: /guestbook');
                exit;
            }

            $infoMessage = 'Невірний email або пароль. <a href="/register">Зареєструватися</a>';
        } elseif (!empty($_POST)) {
            $infoMessage = 'Заповніть форму входу!';
        }

        $this->renderView([
            'infoMessage' => $infoMessage,
        ]);
    }

    public function renderView(array $arguments = [])
    {
        $this->render('loginView', $arguments);
    }
}