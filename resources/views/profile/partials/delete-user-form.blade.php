<section>
    <div class="modal fade" id="deleteAccount" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-3 modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="post" action="{{ route('profile.destroy') }}">
                        @csrf
                        @method('delete')

                        <h3 class="card-title">Tem certeza de que deseja excluir sua conta?</h3>
                        <p class="card-subtitle">Após a exclusão da sua conta, todos os seus recursos e dados serão excluídos permanentemente. Digite sua senha para confirmar que deseja excluir sua conta permanentemente.</p>

                        <div class="row mb-4 align-items-end">
                            <div class="col-8">
                                <label for="password" class="form-label required">Senha</label>
                                <input type="password" id="password" name="password" class="form-control" required autocomplete="off">
                                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn text-uppercase" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger text-uppercase ms-2">Excluir conta</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <h3 class="card-title">Excluir conta</h3>
    <p class="card-subtitle">Após a exclusão da sua conta, todos os seus recursos e dados serão excluídos permanentemente. Antes de excluir sua conta, baixe todos os dados ou informações que deseja manter.</p>

    <button type="button" class="btn btn-danger text-uppercase px-4" data-bs-toggle="modal" data-bs-target="#deleteAccount">
        Excluir conta
    </button>
</section>

@if ($errors->userDeletion->any())
    <script>
        $(document).ready(function () {
            $('#deleteAccount').modal('show');
        });
    </script>
@endif