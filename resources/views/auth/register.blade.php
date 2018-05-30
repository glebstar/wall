@extends('layouts.main')

@section('header')
    <h1 class="blog-title">Регистрация</h1>
    <p class="lead blog-description">Присоединяйтесь к большому сообществу</p>
@endsection

@section('content')
    <form method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <div class="invalid-feedback">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="username">Имя пользователя</label>
            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="username" placeholder="Имя пользователя" name="name" value="{{ old('name') }}" required>
            @if ($errors->has('name'))
                <div class="invalid-feedback">
                    {{ $errors->first('name') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" placeholder="Пароль"  name="password" required>
            @if ($errors->has('password'))
                <div class="invalid-feedback">
                    {{ $errors->first('password') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="confirm_password">Повторите пароль</label>
            <input type="password" class="form-control" id="confirm_password" placeholder="Повторите пароль" name="password_confirmation" required>
        </div>

        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
    </form>
@endsection