<section>
    <header class="app-header mb-6">
        <div class="app-header-content">
            <h2 class="title-md">Информация профиля</h2>
            <p class="text-gray-400">Обновите информацию профиля и адрес электронной почты.</p>
        </div>
    </header>


    @if (session('status') === 'profile-updated')
        <div class="alert-success">
            {{ __('Профиль обновлён.') }}
        </div>
    @endif

    <form method="post" action="{{ route('profile.update') }}" class="card space-y-6">
        @csrf
        @method('patch')

        <!-- Имя -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" autocomplete="name" :value="old('name', $user->name)" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" autocomplete="username" :value="old('email', $user->email)" required />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div>
                <p class="text-sm text-gray-300">
                    Ваш адрес электронной почты не подтверждён.

                    <button form="send-verification" class="btn-muted ml-2">
                        {{ __('Отправить повторно письмо для подтверждения') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                    <div class="alert-info mt-2">
                        {{ __('Новая ссылка для подтверждения отправлена.') }}
                    </div>
                @endif
            </div>
        @endif

        <div class="flex justify-end">
            <x-button type="primary">{{ __('Сохранить') }}</x-button>
        </div>
    </form>
</section>
