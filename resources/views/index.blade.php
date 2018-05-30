@extends('layouts.main')

@section('header')
    <h1 class="blog-title">Стена</h1>
    <p class="lead blog-description">Место, где каждый может высказаться</p>
@endsection

@section('content')
    @if(\Auth::check())
    <form class="mb-5" method="POST" action="{{ route('addpost') }}">
        {{ csrf_field() }}
        <h3>Написать на стене</h3>
        <div class="form-group">
            <label for="title">Заголовок сообщения</label>
            <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title">
            @if ($errors->has('title'))
                <div class="invalid-feedback">
                    {{ $errors->first('title') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="text">Текст сообщения</label>
            <textarea id="text" class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" rows="5" name="body"></textarea>
            @if ($errors->has('body'))
                <div class="invalid-feedback">
                    {{ $errors->first('body') }}
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Написать</button>
    </form>
    @endif

    @foreach($posts as $post)
    <div class="blog-post">
        <h2 class="blog-post-title">{{ $post->title }}</h2>
        <p class="blog-post-meta">Опубликован {{ date('d.m.Y', strtotime($post->created_at)) }}. Автор: {{ $post->user->name }}</p>

        <p>{!!   nl2br($post->body) !!}</p>
    </div>
    <!-- /.blog-post -->
    @endforeach
@endsection