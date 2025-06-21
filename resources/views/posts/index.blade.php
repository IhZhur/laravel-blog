<x-app-layout>
    <x-slot name="header">
        <header class="app-header">
            <div class="app-header-content">
                <h2 class="title-md">Мои посты</h2>
            </div>
        </header>
    </x-slot>

    <div class="app-main">
        <div class="container">
            {{-- Flash сообщение --}}
            @if (session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Кнопка создания поста --}}
            <div class="mb-4 flex justify-end">
                <a href="{{ route('posts.create') }}" class="btn btn-primary">+ Новый пост</a>
            </div>

            {{-- Список постов --}}
            <div class="card">
                @forelse ($posts as $post)
                    <div class="post-item">
                        <h3>{{ $post->title }}</h3>

                        <p>{{ Str::limit($post->content, 200) }}</p>

                        <p class="post-meta">
                            Создан: {{ $post->created_at->format('d.m.Y H:i') }}
                        </p>

                        <div class="mt-3 flex space-x-4">
                            <a href="{{ route('posts.edit', $post) }}" class="text-link">✏️ Редактировать</a>

                            <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Удалить этот пост?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-link text-danger">🗑️ Удалить</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-400">У вас пока нет постов.</p>
                @endforelse
            </div>

            {{-- Пагинация --}}
            <div class="mt-6">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
