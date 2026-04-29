@extends('layouts.app')

@section('content')
    <div class="card card-primary">
        <div class="card-header bg-success text-light">
            Форма реєстрації
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('register.store') }}">
                @csrf
                <div class="form-group mb-3">
                    <label>Email</label>
                    <input class="form-control" type="email" name="email"/>
                </div>
                <div class="form-group mb-3">
                    <label>Пароль</label>
                    <input class="form-control" type="password" name="password"/>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Зареєструватися"/>
                </div>
            </form>

            @if(!empty($infoMessage))
                <hr/>
                <span class="text-danger">{!! $infoMessage !!}</span>
            @endif

        </div>
    </div>
@endsection