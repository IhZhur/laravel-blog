<nav x-data="{ open: false }" class="nav-container">
    <div class="nav-wrapper">
        <!-- Левая часть: логотип и навигация -->
        <div class="nav-left">
            <a href="{{ route('posts.public') }}">
                <x-application-logo class="logo" />
            </a>

            <div class="nav-links">
                <x-nav-link :href="route('posts.public')" :active="request()->routeIs('posts.public')">
                    Все посты
                </x-nav-link>

                @auth
                    <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')">
                        Мои посты
                    </x-nav-link>

                    <x-nav-link :href="route('posts.create')" :active="request()->routeIs('posts.create')">
                        Добавить пост
                    </x-nav-link>
                @endauth
            </div>
        </div>

        <!-- Правая часть: профиль или ссылки -->
        <div class="nav-right">
            @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button type="button" class="dropdown-trigger">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="dropdown-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">Профиль</x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                Выйти
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            @else
                <div class="auth-links">
                    <a href="{{ route('login') }}">Вход</a>
                    <a href="{{ route('register') }}">Регистрация</a>
                </div>
            @endauth
        </div>

        <!-- Мобильное меню: бургер -->
        <div class="hamburger">
            <button @click="open = ! open">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6">
                    <path :class="{ 'hidden': open, 'inline-flex': ! open }" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{ 'hidden': ! open, 'inline-flex': open }" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Мобильное раскрывающееся меню -->
    <div :class="{ 'block': open, 'hidden': ! open }" class="nav-mobile">
        <x-responsive-nav-link :href="route('posts.public')" :active="request()->routeIs('posts.public')">
            Все посты
        </x-responsive-nav-link>

        @auth
            <x-responsive-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')">
                Мои посты
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('posts.create')" :active="request()->routeIs('posts.create')">
                Добавить пост
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('profile.edit')">
                Профиль
            </x-responsive-nav-link>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                    Выйти
                </x-responsive-nav-link>
            </form>
        @else
            <x-responsive-nav-link :href="route('login')">Вход</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('register')">Регистрация</x-responsive-nav-link>
        @endauth
    </div>
</nav>
