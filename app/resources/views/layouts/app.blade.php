<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Guestbook</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/6fca15713e.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">

    <nav class="navbar navbar-expand-lg bg-body-secondary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">
                <span style="color: Dodgerblue;">
                    <i class="fa-brands fa-php fa-2xl"></i>
                </span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('guestbook') }}">Гостьова книга</a>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-right">
                    @if(session('auth'))
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link active">Вийти</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link active">Реєстрація</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link active">Увійти</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <br>
    @yield('content')
</div>
</body>
</html>