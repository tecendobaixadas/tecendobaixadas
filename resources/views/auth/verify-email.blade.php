<x-guest-layout>
    <div class="mb-4 text-small">
        {{ __('Obrigado por se inscrever! Antes de começar, você poderia verificar seu endereço de e-mail clicando no link que acabamos de enviar? Caso não tenha recebido o e-mail, teremos prazer em enviar outro.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 fw-medium text-small text-success">
            {{ __('Um novo link de verificação foi enviado para o endereço de e-mail que você forneceu durante o registro.') }}
        </div>
    @endif

    <div class="mt-4 d-flex align-items-center justify-content-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <button type="submit" class="btn btn-dark px-4">
                    {{ __('Reenviar e-mail de verificação') }}
                </button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="btn px-4">
                {{ __('Sair') }}
            </button>
        </form>
    </div>
</x-guest-layout>
