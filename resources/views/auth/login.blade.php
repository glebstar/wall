@extends('layouts.main')

@section('header')
    <h1 class="blog-title">Авторизация</h1>
    <p class="lead blog-description">С возвращением в большое сообщество имени великой стены</p>
@endsection

@section('content')
    <form method="POST" action="{{ route('login') }}">
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
            <label for="password">Пароль</label>
            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" placeholder="Password" name="password" required>
            @if ($errors->has('password'))
                <div class="invalid-feedback">
                    {{ $errors->first('password') }}
                </div>
            @endif
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="remember" {{ old('remember') ? 'checked' : '' }}>
                Запомнить меня
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Войти</button>
    </form>
@endsection