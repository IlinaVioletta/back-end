<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class GuestbookController extends BaseController
{
    public function index()
    {
        $comments = Comment::getAll();

        return $this->renderView([
            'comments' => $comments,
            'error'    => session('error'),
            'isAuth'   => session('auth', false),
        ]);
    }

    public function store(Request $request)
    {
        if (!session('auth')) {
            return redirect()->route('login');
        }

        $text = trim($request->input('text', ''));

        if ($text === '') {
            session(['error' => 'Повідомлення не може бути порожнім.']);
            return redirect()->route('guestbook');
        }

        Comment::create((int) session('user_id'), $text);

        session()->forget('error');

        return redirect()->route('guestbook');
    }

    public function renderView(array $arguments = [])
    {
        return $this->render('guestbook', $arguments);
    }
}