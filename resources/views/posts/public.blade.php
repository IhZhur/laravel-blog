<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Все посты') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm rounded p-6">
            @forelse ($posts as $post)
                <div class="mb-6 border-b pb-4">
                    <h3 class="text-xl font-bold text-gray-900">{{ $post->title }}</h3>

                    <p class="text-gray-700 mt-2">
                        {{ Str::limit($post->content, 200) }}
                    </p>

                    <p class="text-sm text-gray-500 mt-2">
                        Автор: {{ $post->user->name }}<br>
                        Опубликовано: {{ $post->created_at->format('d.m.Y H:i') }}
                    </p>
                </div>
            @empty
                <p>Постов пока нет.</p>
            @endforelse

            <div class="mt-6">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
