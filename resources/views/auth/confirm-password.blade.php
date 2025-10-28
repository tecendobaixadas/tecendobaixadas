<x-guest-layout>
    <p class="card-subtitle">{{ __('Esta é uma área segura do aplicativo. Confirme sua senha antes de continuar.') }}</p>

    <form method="POST" action="{{ route('password.confirm') }}" id="form">
        @csrf

        <div class="row">
            <!-- Password -->
            <div class="col-12 mb-3">
                <label for="password" class="form-label required">Senha</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Digite aqui" required autofocus autocomplete="new-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
        </div>

        <div class="d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-dark px-4 me-3" form="form">
                {{ __('Confirmar') }}
            </button>
        </div>
    </form>
</x-guest-layout>
