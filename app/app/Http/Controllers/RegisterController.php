<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends BaseController
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
            return $this->renderView(['infoMessage' => 'Заповніть форму реєстрації!']);
        }

        if (User::findByEmail($email)) {
            return $this->renderView([
                'infoMessage' => 'Такий користувач вже існує! <a href="/login">Увійти</a>',
            ]);
        }

        User::create($email, $password);

        return redirect()->route('login');
    }

    public function renderView(array $arguments = [])
    {
        return $this->render('register', $arguments);
    }
}