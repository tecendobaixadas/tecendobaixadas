<x-guest-layout>
    <p class="card-subtitle">{{ __('Esqueceu sua senha? Sem problemas. Basta nos informar seu endereço de e-mail e enviaremos um link para redefinição de senha que permitirá que você escolha uma nova.') }}</p>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" id="form">
        @csrf

        <div class="col">
            <div class="row">

                <!-- Email Address -->
                <div class="col-12 mb-3">
                    <label for="email" class="form-label required">E-mail</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Ex. nome@email.com.br" value="{{ old('email') }}" required autofocus autocomplete="username">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-dark px-4" form="form">
                        {{ __('Link de redefinição de senha de e-mail') }}
                    </button>
                </div>
            </div>
        </div>
    </form>
</x-guest-layout>
