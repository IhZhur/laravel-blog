<x-app-layout>
    <x-slot name="header">
        <header class="app-header">
            <div class="app-header-content">
                <h2 class="title-md">Все посты</h2>
            </div>
        </header>
    </x-slot>

    <div class="app-main">
        <div class="container">
            <div class="card">
                @forelse ($posts as $post)
                    <div class="post-item">
                        <h3 class="title-sm">{{ $post->title }}</h3>

                        <p class="text-gray-300">{{ Str::limit($post->content, 200) }}</p>

                        <p class="post-meta">
                            Автор: {{ $post->user->name }} |
                            Дата: {{ $post->created_at->format('d.m.Y H:i') }}
                        </p>
                    </div>
                @empty
                    <p class="text-gray-400">Постов пока нет.</p>
                @endforelse
            </div>

            <div class="mt-6">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
