<section>
    <h3 class="card-title">Atualizar senha</h3>
    <p class="card-subtitle">Certifique-se de que sua conta esteja usando uma senha longa e aleatória para permanecer segura.</p>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="row">
            <div class="col-7 mb-3">
                <label for="update_password_current_password" class="form-label required">Senha atual</label>
                <input type="password" id="update_password_current_password" name="update_password_current_password" class="form-control" autocomplete="current-password" required>
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
            </div>

            <div class="col-7 mb-3">
                <label for="update_password_password" class="form-label required">Nova Senha</label>
                <input type="password" id="update_password_password" name="update_password_password" class="form-control" autocomplete="new-password" required>
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            </div>

            <div class="col-7 mb-3">
                <label for="update_password_password_confirmation" class="form-label required">Confirme sua senha</label>
                <input type="password" id="update_password_password_confirmation" name="update_password_password_confirmation" class="form-control" autocomplete="new-password" required>
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
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

                @if (session('status') === 'password-updated')
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
    </form>
</section>
