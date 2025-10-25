<x-app-layout>
    <div class="page-header d-print-none" aria-label="Page header">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="col-auto d-flex align-items-center">
                        <a class="btn btn-action" href="{{ route('empresas.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-left">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M5 12l14 0" />
                                <path d="M5 12l4 4" />
                                <path d="M5 12l4 -4" />
                            </svg>
                        </a>
                        <!-- Page pre-title -->
                        <h2 class="page-title">Cadastrar empresa</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ isset($empresa) ? route('empresas.update', $empresa) : route('empresas.store') }}" id="form">
                                @csrf
                                @if(isset($empresa))
                                    @method('PUT')
                                @endif

                                <div class="row mb-3">
                                    <div class="col-7 d-flex align-items-center">
                                        <h3 class="mb-0">Informações cadastrais</h3>
                                    </div>
                                    <div class="col-5 d-flex gap-3 justify-content-end align-items-center">
                                        <button type="submit" class="btn btn-dark px-4" form="form" id="submitBtn">
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
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label required">Razão Social</label>
                                        <input type="text" name="razao_social" class="form-control" value="{{ old('razao_social', $empresa->razao_social ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label required">Nome Fantasia</label>
                                        <input type="text" name="nome_fantasia" class="form-control" value="{{ old('nome_fantasia', $empresa->nome_fantasia ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label required">CNPJ</label>
                                        <input type="text" name="cnpj" class="form-control format-cnpj" value="{{ old('cnpj', $empresa->cnpj ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Inscrição Estadual</label>
                                        <input type="text" name="inscricao_estadual" class="form-control" value="{{ old('inscricao_estadual', $empresa->inscricao_estadual ?? '') }}">
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label required">Data da Fundação</label>
                                        <input type="date" name="data_fundacao" class="form-control" value="{{ old('data_fundacao', $empresa->data_fundacao ?? '') }}" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col d-flex align-items-center">
                                        <h3 class="mb-0">Endereço</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label required">Logradouro</label>
                                        <input type="text" name="logradouro" class="form-control" value="{{ old('logradouro', $empresa->logradouro ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label required">Bairro</label>
                                        <input type="text" name="bairro" class="form-control" value="{{ old('bairro', $empresa->bairro ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label required">Estado</label>
                                        <input type="text" name="estado" class="form-control" value="{{ old('estado', $empresa->estado ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label required">Cidade</label>
                                        <input type="text" name="cidade" class="form-control" value="{{ old('cidade', $empresa->cidade ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label required">CEP</label>
                                        <input type="text" name="cep" class="form-control format-cep" value="{{ old('cep', $empresa->cep ?? '') }}" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col d-flex align-items-center">
                                        <h3 class="mb-0">Contato</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label required">Telefone Fixo</label>
                                        <input type="text" name="telefone_fixo" class="form-control format-telefone" value="{{ old('telefone_fixo', $empresa->telefone_fixo ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label required">E-mail Principal</label>
                                        <input type="email" name="email_principal" class="form-control" value="{{ old('email_principal', $empresa->email_principal ?? '') }}" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col d-flex align-items-center">
                                        <h3 class="mb-0">Responsável legal</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label required">Nome Completo</label>
                                        <input type="text" name="nome_completo" class="form-control" value="{{ old('nome_completo', $empresa->nome_completo ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label required">CPF</label>
                                        <input type="text" name="cpf" class="form-control format-cpf" value="{{ old('cpf', $empresa->cpf ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label required">Cargo</label>
                                        <input type="text" name="cargo" class="form-control" value="{{ old('cargo', $empresa->cargo ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label required">E-mail de Contato</label>
                                        <input type="email" name="email_contato" class="form-control" value="{{ old('email_contato', $empresa->email_contato ?? '') }}" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col d-flex align-items-center">
                                        <h3 class="mb-0">Oportunidades</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label required">Modelo de atuação</label>
                                        <input type="text" name="modelo_atuacao" class="form-control" value="{{ old('modelo_atuacao', $empresa->modelo_atuacao ?? '') }}" required>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>