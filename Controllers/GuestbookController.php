<?php

namespace guestbook\Controllers;

use guestbook\Models\Comment;

class GuestbookController extends BaseController
{
    public function execute()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_SESSION['auth'])) {
            $text = trim($_POST['text'] ?? '');

            if ($text === '') {
                $error = 'Повідомлення не може бути порожнім.';
            } else {
                Comment::create((int) $_SESSION['user_id'], $text);
                header('Location: /guestbook');
                exit;
            }
        }

        $comments = Comment::getAll();

        $this->renderView([
            'comments' => $comments,
            'error' => $error,
            'isAuth' => !empty($_SESSION['auth']),
        ]);
    }

    public function renderView(array $arguments = [])
    {
        $this->render('guestbookView', $arguments);
    }
}