<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    public function index()
    {
        return view('index', [
            'posts' => Post::orderBy('id', 'desc')->get()
        ]);
    }

    public function addPost(Request $request)
    {
        $errors = [];

        if (!$request->title or preg_match('/^\s+$/', $request->title)) {
            $errors['title'] = 'Заголовок не может быть пустым';
        }

        if (mb_strlen($request->title) > 70) {
            $errors['title'] = 'Слишком длинный заголовок';
        }

        if (!$request->body or preg_match('/^\s+$/', $request->body)) {
            $errors['body'] = 'Сообщение не может быть пустым';
        }

        if (!empty($errors)) {
            return redirect()->back()->withErrors($errors)->withInput();
        }

        // можно сохранять
        Post::create([
            'user_id' => \Auth::user()->id,
            'title'   => $request->title,
            'body'    => strip_tags($request->body)
        ]);

        return redirect()->route('index');
    }
}
