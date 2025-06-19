<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Мои посты') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">

        {{-- Flash-сообщение об успехе --}}
        @if (session('success'))
            <div class="mb-4 p-4 rounded bg-green-100 text-green-800">
                {{ session('success') }}
            </div>
        @endif

        {{-- Кнопка "Создать пост" --}}
        <div class="mb-4">
            <a href="{{ route('posts.create') }}"
               class="inline-block px-4 py-2 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700 transition">
                + Новый пост
            </a>
        </div>

        {{-- Список постов --}}
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            @forelse ($posts as $post)
                <div class="mb-6 border-b pb-4">
                    <h3 class="text-lg font-bold text-gray-900">{{ $post->title }}</h3>

                    <p class="text-gray-700 mt-2">
                        {{ Str::limit($post->content, 200) }}
                    </p>

                    <p class="text-sm text-gray-500 mt-1">
                        Создан: {{ $post->created_at->format('d.m.Y H:i') }}
                    </p>

                    <div class="mt-3 flex space-x-4">
                        <a href="{{ route('posts.edit', $post) }}"
                           class="text-blue-600 hover:underline text-sm">
                            Редактировать
                        </a>

                        <form action="{{ route('posts.destroy', $post) }}" method="POST"
                              onsubmit="return confirm('Удалить этот пост?')" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline text-sm">
                                Удалить
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-gray-600">У вас пока нет постов.</p>
            @endforelse
        </div>

        {{-- Пагинация --}}
        <div class="mt-6">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
