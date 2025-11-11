<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" id="form">
        @csrf

        <h2 class="h2 text-center mb-4">{{ __('Faça seu cadastro') }}</h2>

        <div class="col">
            <div class="row">

                <!-- Name -->
                <div class="col-12 mb-3">
                    <label for="name" class="form-label required">Nome completo</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Digite aqui" value="{{ old('name') }}" required autofocus autocomplete="name">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="col-12 mb-3">
                    <label for="email" class="form-label required">E-mail</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Digite aqui" value="{{ old('email') }}" required autocomplete="email">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Data de nascimento -->
                <div class="col-12 mb-3">
                    <label for="data_nascimento" class="form-label required">Data de nascimento</label>
                    <input type="date" id="data_nascimento" name="data_nascimento" class="form-control" placeholder="Digite aqui" value="{{ old('data_nascimento') }}" required>
                    <x-input-error :messages="$errors->get('data_nascimento')" class="mt-2" />
                </div>

                <!-- Estado -->
                <div class="col-12 mb-3">
                    <label for="estado" class="form-label required">Estado</label>
                    <input type="text" id="estado" name="estado" class="form-control" placeholder="Digite aqui" value="{{ old('estado') }}" required autofocus autocomplete="estado">
                    <x-input-error :messages="$errors->get('estado')" class="mt-2" />
                </div>

                <!-- Cidade -->
                <div class="col-12 mb-3">
                    <label for="cidade" class="form-label required">Cidade</label>
                    <input type="text" id="cidade" name="cidade" class="form-control" placeholder="Digite aqui" value="{{ old('cidade') }}" required autofocus autocomplete="cidade">
                    <x-input-error :messages="$errors->get('cidade')" class="mt-2" />
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

                <!-- Aceito os Termos -->
                <div class="col-12">
                    <label for="aceito_termos" class="form-check">
                        <input type="checkbox" id="aceito_termos" name="aceito_termos" class="form-check-input" value="1">
                        <span class="form-check-label">Aceito os <a href="#" class="text-muted text-decoration-underline">Termos de Uso</a></span>
                        <x-input-error :messages="$errors->get('aceito_termos')" class="mt-2" />
                    </label>
                </div>

                <!-- Receber novidades -->
                <div class="col-12 mb-3">
                    <label for="receber_novidades" class="form-check">
                        <input type="checkbox" id="receber_novidades" name="receber_novidades" class="form-check-input" value="1" {{ old('receber_novidades') ? 'checked' : '' }}>
                        <span class="form-check-label">Gostaria de receber novidades</span>
                    </label>
                </div>

                <div class="d-flex align-items-center justify-content-center">
                    <button type="submit" class="btn btn-dark px-4 me-3" form="form">
                        {{ __('Cadastrar') }}
                    </button>
                </div>
            </div>
        </div>
    </form>
</x-guest-layout>
