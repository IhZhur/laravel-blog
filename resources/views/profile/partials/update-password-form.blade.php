<section>
    <header class="app-header mb-6">
        <div class="app-header-content">
            <h2 class="title-md">Изменить пароль</h2>
            <p class="text-gray-400">Убедитесь, что используете надёжный, случайный пароль.</p>
        </div>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="card space-y-6">
        @csrf
        @method('put')

        <!-- Текущий пароль -->
        <div>
            <x-input-label for="current_password" :value="__('Текущий пароль')" />
            <x-text-input id="current_password" name="current_password" type="password" autocomplete="current-password" />
            <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
        </div>

        <!-- Новый пароль -->
        <div>
            <x-input-label for="password" :value="__('Новый пароль')" />
            <x-text-input id="password" name="password" type="password" autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Подтверждение -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Подтвердите пароль')" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Кнопка -->
        <div class="flex items-center gap-4">
            <x-button type="primary">
                {{ __('Сохранить') }}
            </x-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-green-400 text-sm"
                >
                    {{ __('Сохранено.') }}
                </p>
            @endif
        </div>
    </form>
</section>
