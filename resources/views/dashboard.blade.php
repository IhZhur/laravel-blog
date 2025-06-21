<x-app-layout>
    <x-slot name="header">
        <header class="app-header">
            <div class="app-header-content">
                <h2 class="title-md">Панель управления</h2>
            </div>
        </header>
    </x-slot>


    <div class="app-main">
        <div class="container">
            {{-- Flash сообщение --}}
            @if (session('status'))
                <div class="alert-success">
                    {{ session('status') }}
                </div>
            @endif

            {{-- Основной контент --}}
            <div class="card">
                Вы вошли в систему!
            </div>
        </div>
    </div>
</x-app-layout>
