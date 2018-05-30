<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/app.css" />
</head>

<body>

<div class="blog-masthead">
    <div class="container">
        <nav class="nav">
            <a class="nav-link @if(\Request::path() == '/')active @endif" href="/">Стена</a>
            @if(!\Auth::check())
            <a class="nav-link @if(\Request::path() == 'register')active @endif" href="/register">Зарегистрироваться</a>
            <a class="nav-link @if(\Request::path() == 'login')active @endif" href="/login">Войти</a>
            @endif
            @if(\Auth::check())
            <span class="nav-link ml-auto">{{ '@' . \Auth::user()->name }}</span>
            <a class="nav-link" href="#">Выйти</a>
            @endif
        </nav>
    </div>
</div>

<div class="blog-header">
    <div class="container">
        @yield('header')
    </div>
</div>

<div class="container">

    <div class="row mb-5">

        <div class="col-sm-8 blog-main">
            @yield('content')
        </div>
        <!-- /.blog-main -->

        <div class="col-sm-3 offset-sm-1 blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">
                <h4>Статистика</h4>
                <p>Всего постов: 4.</p>
                <p>Дата первого: 26.09.2017.</p>
                <p>Дата последнего: 27.09.2017.</p>
                <p>Автор первого: Иван</p>
                <p>Автор последнего: Петя</p>
            </div>
            <!-- /.blog-sidebar -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <footer class="blog-footer">
        <p>Тестовое задание на должность PHP разработчика.</p>
        <p>
            <a href="#">Наверх</a>
        </p>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</body>

</html>