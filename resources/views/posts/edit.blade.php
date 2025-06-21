<x-app-layout>
    <x-slot name="header">
        <header class="app-header">
            <div class="app-header-content">
                <h2 class="title-md">Редактировать пост</h2>
            </div>
        </header>
    </x-slot>

    <div class="app-main">
        <div class="container">
            @if ($errors->any())
                <div class="alert-error">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('posts.update', $post) }}" class="card space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="title" class="form-label">Заголовок</label>
                    <input type="text" name="title" id="title" class="form-input" value="{{ old('title', $post->title) }}" required autofocus>
                </div>

                <div>
                    <label for="content" class="form-label">Содержимое</label>
                    <textarea name="content" id="content" class="form-textarea" required>{{ old('content', $post->content) }}</textarea>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="btn-primary">Обновить</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
