<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Редактировать пост') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-2xl mx-auto sm:px-6 lg:px-8">

        {{-- Ошибки валидации --}}
        @if ($errors->any())
            <div class="mb-4 bg-red-100 text-red-800 p-4 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Форма --}}
        <form method="POST" action="{{ route('posts.update', $post) }}">
            @csrf
            @method('PUT')

            {{-- Заголовок --}}
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Заголовок</label>
                <input type="text" name="title" id="title"
                       class="mt-1 block w-full rounded border-gray-300 shadow-sm"
                       value="{{ old('title', $post->title) }}" required>
            </div>

            {{-- Контент --}}
            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Содержимое</label>
                <textarea name="content" id="content" rows="6"
                          class="mt-1 block w-full rounded border-gray-300 shadow-sm"
                          required>{{ old('content', $post->content) }}</textarea>
            </div>

            {{-- Кнопки --}}
            <div class="flex justify-start space-x-4">
                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Обновить
                </button>
                <a href="{{ route('posts.index') }}"
                   class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">
                    Отмена
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
