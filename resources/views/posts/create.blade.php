<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-white">
            {{ __('Новый пост') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm rounded p-6">
            <form method="POST" action="{{ route('posts.store') }}">
                @csrf

                <!-- Заголовок -->
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">
                        Заголовок
                    </label>
                    <input type="text" name="title" id="title"
                           class="mt-1 block w-full max-w-3xl rounded border-gray-300 shadow-sm"
                           value="{{ old('title') }}" required>
                    @error('title')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Содержимое -->
                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium text-gray-700">
                        Содержимое
                    </label>
                    <textarea name="content" id="content" rows="6"
                              class="mt-1 block w-full max-w-3xl rounded border-gray-300 shadow-sm"
                              required>{{ old('content') }}</textarea>
                    @error('content')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Кнопки -->
                <div class="flex space-x-4 mt-6">
                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded hover:bg-blue-700 transition">
                        Сохранить
                    </button>
                    <a href="{{ route('posts.index') }}"
                       class="px-4 py-2 bg-gray-500 text-white text-sm font-semibold rounded hover:bg-gray-600 transition">
                        Отмена
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
