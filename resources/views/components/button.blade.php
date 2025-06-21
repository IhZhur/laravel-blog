@props([
    'variant' => 'primary',
    'type' => 'submit',
    'href' => null,
])

@php
    $base = 'inline-flex items-center px-4 py-2 text-sm font-semibold rounded transition';
    $styles = match($variant) {
        'primary' => 'bg-blue-600 text-white hover:bg-blue-700',
        'secondary' => 'bg-white text-gray-700 border border-gray-400 hover:bg-gray-600 hover:text-white',
        'danger' => 'bg-white text-red-600 border border-red-600 hover:bg-red-600 hover:text-white',
        default => '',
    };
    $class = "$base $styles";
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $class]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $class]) }}>
        {{ $slot }}
    </button>
@endif
