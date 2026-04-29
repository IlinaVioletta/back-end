<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends BaseController
{
    public function index()
    {
        if (session('auth')) {
            return redirect()->route('guestbook');
        }

        return $this->renderView(['infoMessage' => '']);
    }

    public function store(Request $request)
    {
        $email    = trim($request->input('email', ''));
        $password = trim($request->input('password', ''));

        if (!$email || !$password) {
            return $this->renderView(['infoMessage' => 'Заповніть форму входу!']);
        }

        $user = User::findByEmailAndPassword($email, $password);

        if ($user) {
            session([
                'auth'    => true,
                'user_id' => $user->id,
                'email'   => $user->email,
            ]);
            return redirect()->route('guestbook');
        }

        return $this->renderView([
            'infoMessage' => 'Невірний email або пароль. <a href="/register">Зареєструватися</a>',
        ]);
    }

    public function renderView(array $arguments = [])
    {
        return $this->render('login', $arguments);
    }
}