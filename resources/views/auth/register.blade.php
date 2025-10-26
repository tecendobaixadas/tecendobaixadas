<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nome')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('E-mail')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Data de nascimento -->
        <div class="mt-4">
            <x-input-label for="data_nascimento" :value="__('Data de nascimento')" />
            <x-text-input id="data_nascimento" class="block mt-1 w-full" type="date"
                name="data_nascimento" :value="old('data_nascimento')" required />
            <x-input-error :messages="$errors->get('data_nascimento')" class="mt-2" />
        </div>

        <!-- Estado -->
        <div class="mt-4">
            <x-input-label for="estado" :value="__('Estado')" />
            <x-text-input id="estado" class="block mt-1 w-full" type="text"
                name="estado" :value="old('estado')" required />
            <x-input-error :messages="$errors->get('estado')" class="mt-2" />
        </div>

        <!-- Cidade -->
        <div class="mt-4">
            <x-input-label for="cidade" :value="__('Cidade')" />
            <x-text-input id="cidade" class="block mt-1 w-full" type="text"
                name="cidade" :value="old('cidade')" required />
            <x-input-error :messages="$errors->get('cidade')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Senha')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar senha')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Aceito os Termos -->
        <div class="mt-4 flex items-center">
            <label for="aceito_termos" class="ms-2 text-sm text-gray-600 form-check">
                <input type="checkbox" id="aceito_termos" name="aceito_termos" value="1" class="form-check-input" required>
                <span class="form-check-label">Aceito os <a href="#" class="text-indigo-600 underline">Termos de Uso</a></span>
            </label>
            <x-input-error :messages="$errors->get('aceito_termos')" class="mt-2" />
        </div>

        <!-- Receber novidades -->
        <div class="mt-4 flex items-center">
            <label for="receber_novidades" class="ms-2 text-sm text-gray-600 form-check">
                <input type="checkbox" id="receber_novidades" name="receber_novidades" class="form-check-input" value="1"
                    {{ old('receber_novidades') ? 'checked' : '' }}>
                <span class="form-check-label">Gostaria de receber novidades</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Cadastrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
