@extends('layouts.app')

@section('content')
    <div class="card card-primary">
        <div class="card-header bg-primary text-light">
            Гостьова книга
        </div>
        <div class="card-body">

            @if(!empty($error))
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endif

            @if(!empty($isAuth))
                <div class="row">
                    <div class="col-sm-6">
                        <form method="POST" action="{{ route('guestbook.store') }}">
                            @csrf
                            <div class="mb-3">
                                <textarea name="text" class="form-control" placeholder="Ваше повідомлення" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Надіслати</button>
                        </form>
                    </div>
                </div>
            @else
                <p class="text-muted">
                    Щоб залишити коментар,
                    <a href="{{ route('login') }}">увійдіть</a>
                    або
                    <a href="{{ route('register') }}">зареєструйтесь</a>.
                </p>
            @endif

        </div>
    </div>

    <br>

    <div class="card card-primary">
        <div class="card-header bg-body-secondary text-dark">
            Коментарі
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">

                    @if(empty($comments))
                        <p class="text-muted">Коментарів ще немає.</p>
                    @endif

                    @foreach($comments as $comment)
                        <div class="card mb-2">
                            <div class="card-body">
                                <h6 class="text-muted">{{ $comment['email'] }}</h6>
                                <p>{{ $comment['text'] }}</p>
                                <small class="text-muted">{{ $comment['date'] }}</small>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection