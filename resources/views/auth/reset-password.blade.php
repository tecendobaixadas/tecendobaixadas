<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}" id="form">
        @csrf

        <div class="col">
            <div class="row">

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div class="col-12 mb-3">
                    <label for="email" class="form-label required">E-mail</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Ex. nome@email.com.br" value="{{ old('email') }}" required autofocus autocomplete="username">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="col-12 mb-3">
                    <label for="password" class="form-label required">Senha</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Digite aqui" required autofocus autocomplete="new-password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="col-12 mb-3">
                    <label for="password_confirmation" class="form-label required">Confirmar senha</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Digite aqui" required autofocus autocomplete="new-password">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-dark px-4" form="form">
                        {{ __('Redefinir senha') }}
                    </button>
                </div>

            </div>
        </div>

    </form>
</x-guest-layout>
