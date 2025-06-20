@props([
    'type' => 'info',
    'message',
])

@php
    $styles = [
        'success' => 'bg-green-100 text-green-800 border-green-300',
        'error'   => 'bg-red-100 text-red-800 border-red-300',
        'warning' => 'bg-yellow-100 text-yellow-800 border-yellow-300',
        'info'    => 'bg-blue-100 text-blue-800 border-blue-300',
    ];

    $icons = [
        'success' => '✔️',
        'error'   => '❌',
        'warning' => '⚠️',
        'info'    => 'ℹ️',
    ];
@endphp

<div
    x-data="{ show: true }"
    x-init="setTimeout(() => show = false, 5000)"
    x-show="show"
    x-transition
    class="mb-4 p-4 border-l-4 rounded shadow-sm relative {{ $styles[$type] ?? $styles['info'] }}"
>
    <span class="mr-2">{{ $icons[$type] ?? $icons['info'] }}</span>
    {{ $message }}

    <button
        @click="show = false"
        class="absolute top-2 right-2 text-xl leading-none focus:outline-none hover:text-gray-500"
        title="Закрыть"
    >
        &times;
    </button>
</div>
