<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-100">
            {{ __('Мои посты') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">

        {{-- Flash сообщение --}}
        @if (session('success'))
            <x-alert type="success" :message="session('success')" />
        @endif

        {{-- Кнопка создания поста --}}
        <div class="mb-6 flex justify-end">
            <a href="{{ route('posts.create') }}"
               class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm rounded shadow transition">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
                </svg>
                Новый пост
            </a>
        </div>

        {{-- Список постов --}}
        <div class="bg-white dark:bg-gray-900 shadow-sm sm:rounded-lg p-6 divide-y divide-gray-200 dark:divide-gray-700">
            @forelse ($posts as $post)
                <div class="py-4">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100">{{ $post->title }}</h3>

                    <p class="text-gray-700 dark:text-gray-300 mt-2">
                        {{ Str::limit($post->content, 200) }}
                    </p>

                    <p class="text-sm text-gray-500 mt-1">
                        Создан: {{ $post->created_at->format('d.m.Y H:i') }}
                    </p>

                    <div class="mt-3 flex space-x-4">
                        <a href="{{ route('posts.edit', $post) }}"
                           class="text-sm text-indigo-600 hover:underline">✏️ Редактировать</a>

                        <form action="{{ route('posts.destroy', $post) }}" method="POST"
                              onsubmit="return confirm('Удалить этот пост?')" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-sm text-red-600 hover:underline">
                                🗑️ Удалить
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-gray-600 dark:text-gray-400 text-sm">У вас пока нет постов.</p>
            @endforelse
        </div>

        {{-- Пагинация --}}
        <div class="mt-6">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
