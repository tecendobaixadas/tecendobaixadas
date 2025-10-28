<section>
    <h3 class="card-title">Informações do perfil</h3>
    <p class="card-subtitle">Atualize as informações do perfil e o endereço de e-mail da sua conta.</p>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" id="formProfile" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="row">
            <div class="col-5 d-flex justify-content-center">
                <div class="text-center">
                    <label for="logo" class="text-center cursor-pointer d-block">
                        <div id="avatarPreview" class="avatar avatar-1 rounded-circle avatar-2xl border-0 mb-1"
                            @if(!empty($user->logo))
                                style="background-image: url('{{ asset('storage/' . $user->logo) }}')"
                            @endif>
                            @if(empty($user->logo))
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" 
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.4">
                                        <path d="M4 21C3.45 21 2.97917 20.8042 2.5875 20.4125C2.19583 20.0208 2 19.55 2 19V7C2 6.45 2.19583 5.97917 2.5875 5.5875C2.97917 5.19583 3.45 5 4 5H7.15L8.4 3.65C8.58333 3.45 8.80417 3.29167 9.0625 3.175C9.32083 3.05833 9.59167 3 9.875 3H14.125C14.4083 3 14.6792 3.05833 14.9375 3.175C15.1958 3.29167 15.4167 3.45 15.6 3.65L16.85 5H20C20.55 5 21.0208 5.19583 21.4125 5.5875C21.8042 5.97917 22 6.45 22 7V19C22 19.55 21.8042 20.0208 21.4125 20.4125C21.0208 20.8042 20.55 21 20 21H4ZM4 19H20V7H15.95L14.125 5H9.875L8.05 7H4V19ZM8 17H16V16.45C16 15.7 15.6333 15.1042 14.9 14.6625C14.1667 14.2208 13.2 14 12 14C10.8 14 9.83333 14.2208 9.1 14.6625C8.36667 15.1042 8 15.7 8 16.45V17ZM12 13C12.55 13 13.0208 12.8042 13.4125 12.4125C13.8042 12.0208 14 11.55 14 11C14 10.45 13.8042 9.97917 13.4125 9.5875C13.0208 9.19583 12.55 9 12 9C11.45 9 10.9792 9.19583 10.5875 9.5875C10.1958 9.97917 10 10.45 10 11C10 11.55 10.1958 12.0208 10.5875 12.4125C10.9792 12.8042 11.45 13 12 13Z" fill="black"/>
                                    </g>
                                </svg>
                            @endif
                        </div>
                        <span class="form-label">Carregar foto de perfil</span>
                    </label>

                    <input type="file" id="logo" name="logo" class="d-none" accept=".jpg,.jpeg,.png,.webp">
                    <button type="button" id="removerImagem" class="btn btn-outline-danger btn-sm d-none">
                        Remover imagem
                    </button>
                </div>
            </div>

            <div class="col">
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="name" class="form-label required">Nome</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name ?? '') }}" required>
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>
                    <div class="col-12 mb-3">
                        <label for="email" class="form-label required">E-mail</label>
                        <input type="text" id="email" name="email" class="form-control" value="{{ old('email', $user->email ?? '') }}" required autocomplete="username">
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />

                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                            <div>
                                <p class="mt-2 mb-0">
                                    {{ __('Seu endereço de e-mail não foi verificado.') }}

                                    <button type="submit" class="btn btn-dark btn-outline btn-sm px-4 me-3" form="send-verification">
                                        {{ __('Clique aqui para reenviar o e-mail de verificação.') }}
                                    </button>
                                </p>

                                @if (session('status') === 'verification-link-sent')
                                    <p class="mt-2 mb-0">
                                        {{ __('Um novo link de verificação foi enviado para seu endereço de e-mail.') }}
                                    </p>
                                @endif
                            </div>
                        @endif
                    </div>

                    <div class="d-flex align-items-center">
                        <button type="submit" class="btn btn-dark px-4 me-3" form="formProfile">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-device-floppy">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                    <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                    <path d="M14 4l0 4l-6 0l0 -4" />
                                </svg>
                            </span>
                            Salvar
                        </button>

                        @if (session('status') === 'profile-updated')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-muted mb-0"
                            >{{ __('Salvo') }}</p>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </form>
</section>

<script>
    $(document).ready(function() {
        const $input = $('#logo');
        const $preview = $('#avatarPreview');
        const $removerBtn = $('#removerImagem');

        // SVG padrão caso não haja imagem
        const defaultSVG = `
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" 
                xmlns="http://www.w3.org/2000/svg">
                <g opacity="0.4">
                    <path d="M4 21C3.45 21 2.97917 20.8042 2.5875 20.4125C2.19583 20.0208 2 19.55 2 19V7C2 6.45 2.19583 5.97917 2.5875 5.5875C2.97917 5.19583 3.45 5 4 5H7.15L8.4 3.65C8.58333 3.45 8.80417 3.29167 9.0625 3.175C9.32083 3.05833 9.59167 3 9.875 3H14.125C14.4083 3 14.6792 3.05833 14.9375 3.175C15.1958 3.29167 15.4167 3.45 15.6 3.65L16.85 5H20C20.55 5 21.0208 5.19583 21.4125 5.5875C21.8042 5.97917 22 6.45 22 7V19C22 19.55 21.8042 20.0208 21.4125 20.4125C21.0208 20.8042 20.55 21 20 21H4ZM4 19H20V7H15.95L14.125 5H9.875L8.05 7H4V19ZM8 17H16V16.45C16 15.7 15.6333 15.1042 14.9 14.6625C14.1667 14.2208 13.2 14 12 14C10.8 14 9.83333 14.2208 9.1 14.6625C8.36667 15.1042 8 15.7 8 16.45V17ZM12 13C12.55 13 13.0208 12.8042 13.4125 12.4125C13.8042 12.0208 14 11.55 14 11C14 10.45 13.8042 9.97917 13.4125 9.5875C13.0208 9.19583 12.55 9 12 9C11.45 9 10.9792 9.19583 10.5875 9.5875C10.1958 9.97917 10 10.45 10 11C10 11.55 10.1958 12.0208 10.5875 12.4125C10.9792 12.8042 11.45 13 12 13Z" fill="black"/>
                </g>
            </svg>
        `;

        // Se já tiver imagem, mostra o botão de remover
        if ($preview.css('background-image') !== 'none') {
            $removerBtn.removeClass('d-none');
        }

        // Selecionar nova imagem
        $input.on('change', function(event) {
            const file = event.target.files[0];
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $preview.css('background-image', `url('${e.target.result}')`);
                    $preview.html(''); // Remove SVG
                    $removerBtn.removeClass('d-none');
                };
                reader.readAsDataURL(file);
            } else {
                alert('Por favor, selecione um arquivo de imagem válido.');
                $input.val('');
            }
        });

        // Remover imagem
        $removerBtn.on('click', function() {
            $input.val('');
            $preview.css('background-image', 'none').html(defaultSVG);
            $removerBtn.addClass('d-none');
        });
    });
</script>