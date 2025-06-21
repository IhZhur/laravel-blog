<section class="space-y-6">
    <header class="app-header mb-6">
        <div class="app-header-content">
            <h2 class="title-md">Удаление аккаунта</h2>
            <p class="text-gray-400">
                После удаления учётной записи все её ресурсы и данные будут удалены без возможности восстановления.
                Перед удалением, пожалуйста, сохраните всё, что может быть вам нужно.
            </p>
        </div>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >
        {{ __('Удалить аккаунт') }}
    </x-danger-button>

    <x-modal name="confirm-user-deletion" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="card space-y-6 p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-white">
                {{ __('Вы уверены, что хотите удалить свой аккаунт?') }}
            </h2>

            <p class="text-sm text-gray-400">
                После удаления вашей учётной записи все её ресурсы и данные будут удалены без возможности восстановления. Пожалуйста, введите свой пароль, чтобы подтвердить удаление.
            </p>

            <div>
                <x-input-label for="password" :value="__('Пароль')" />
                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-full"
                    autocomplete="current-password"
                />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end gap-4">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Отмена') }}
                </x-secondary-button>

                <x-danger-button>
                    {{ __('Удалить аккаунт') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
