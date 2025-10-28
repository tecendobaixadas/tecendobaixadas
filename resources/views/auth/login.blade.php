<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" id="form">
        @csrf

        <h2 class="h2 text-center mb-4">{{ __('Faça login na sua conta') }}</h2>

        <div class="col">
            <div class="row">

                <!-- Email Address -->
                <div class="col-12 mb-3">
                    <label for="email" class="form-label required">E-mail</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Ex. nome@email.com.br" value="{{ old('email') }}" required autofocus autocomplete="username">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="col-12 mb-2">
                    <label for="password" class="form-label required">Senha</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Digite aqui" value="{{ old('password') }}" required autocomplete="current-password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

            </div>
        </div>

        <!-- Remember Me -->
        <!-- <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div> -->

        @if (Route::has('password.request'))
        <div class="text-end mb-3">
            <a class="text-muted text-decoration-underline" href="{{ route('password.request') }}">
                {{ __('Esqueci minha senha') }}
            </a>
        </div>
        @endif

        <div class="d-flex align-items-center justify-content-center mb-6">
            <button type="submit" class="btn btn-dark px-4 me-3" form="form">
                {{ __('Login') }}
            </button>
        </div>
    </form>

</x-guest-layout>
