<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostController extends Controller
{
    use AuthorizesRequests;

    /**
     * Отобразить список постов текущего пользователя.
     */
    public function index()
    {
        $posts = Auth::user()->posts()->latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    /**
     * Показать форму создания нового поста.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Сохранить новый пост в базе данных.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Auth::user()->posts()->create($request->only('title', 'content'));

        return redirect()->route('posts.index')->with('success', 'Пост успешно создан!');
    }

    /**
     * Показать форму редактирования поста.
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }

    /**
     * Обновить пост в базе данных.
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post->update($request->only('title', 'content'));

        return redirect()->route('posts.index')->with('success', 'Пост обновлён.');
    }

    /**
     * Удалить пост.
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Пост удалён.');
    }
}
