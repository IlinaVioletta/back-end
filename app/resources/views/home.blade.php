@extends('layouts.app')

@section('content')
    <div class="card card-primary">
        <div class="card-header bg-primary text-light">
            Головна сторінка
        </div>
        <div class="card-body">
            <h5 class="card-title">Вітаємо на головній сторінці!</h5>
            <p class="card-text">
                Це простий приклад вебдодатку з аутентифікацією та гостьовою книгою.
            </p>
            <a href="{{ route('guestbook') }}" class="btn btn-primary">
                Перейти до гостьової книги
            </a>
        </div>
    </div>
@endsection