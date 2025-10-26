<x-app-layout>
    <div class="page-header d-print-none" aria-label="Page header">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="col-auto d-flex align-items-center">
                        <a class="btn btn-action" href="{{ route('ongs.index' ?? '') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-left">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M5 12l14 0" />
                                <path d="M5 12l4 4" />
                                <path d="M5 12l4 -4" />
                            </svg>
                        </a>
                        <!-- Page pre-title -->
                        <h2 class="page-title">Cadastrar de ONG</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Ops! Encontramos alguns erros:</strong>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $erro)
                                <li>{{ $erro }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ isset($ong) ? route('ongs.update', $ong) : route('ongs.store') }}" id="form">
                                @csrf
                                @if(isset($ong))
                                    @method('PUT')
                                @endif

                                <div class="row mb-3">
                                    <div class="col-7 d-flex align-items-center">
                                        <h3 class="mb-0">Informações institucionais</h3>
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
                                        <label for="nome_organizacao" class="form-label required">Nome da organização</label>
                                        <input type="text" id="nome_organizacao" name="nome_organizacao" class="form-control" value="{{ old('nome_organizacao', $ong->nome_organizacao ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="cnpj" class="form-label">CNPJ</label>
                                        <input type="text" id="cnpj" name="cnpj" class="form-control format-cnpj" value="{{ old('cnpj', $ong->cnpj ?? '') }}">
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="natureza_juridica" class="form-label required">Natureza jurídica</label>
                                        <input type="text" id="natureza_juridica" name="natureza_juridica" class="form-control" value="{{ old('natureza_juridica', $ong->natureza_juridica ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="data_fundacao" class="form-label">Data da fundação</label>
                                        <input type="date" id="data_fundacao" name="data_fundacao" class="form-control" value="{{ old('data_fundacao', isset($ong->data_fundacao) ? $ong->data_fundacao->format('Y-m-d') : '') }}">
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="area_atuacao" class="form-label required">Área de atuação</label>
                                        <input type="text" id="area_atuacao" name="area_atuacao" class="form-control" value="{{ old('area_atuacao', $ong->area_atuacao ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="modelo_atuacao" class="form-label required">Modelo de atuação</label>
                                        <input type="text" id="modelo_atuacao" name="modelo_atuacao" class="form-control" value="{{ old('modelo_atuacao', $ong->modelo_atuacao ?? '') }}" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col d-flex align-items-center">
                                        <h3 class="mb-0">Endereço</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="cep" class="form-label required">CEP</label>
                                        <input type="text" id="cep" name="cep" class="form-control format-cep" value="{{ old('cep', $ong->cep ?? '') }}" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="logradouro" class="form-label required">Logradouro</label>
                                        <input type="text" id="logradouro" name="logradouro" class="form-control" value="{{ old('logradouro', $ong->logradouro ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="bairro" class="form-label required">Bairro</label>
                                        <input type="text" id="bairro" name="bairro" class="form-control" value="{{ old('bairro', $ong->bairro ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="estado" class="form-label required">Estado</label>
                                        <input type="text" id="estado" name="estado" class="form-control" value="{{ old('estado', $ong->estado ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="cidade" class="form-label required">Cidade</label>
                                        <input type="text" id="cidade" name="cidade" class="form-control" value="{{ old('cidade', $ong->cidade ?? '') }}" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col d-flex align-items-center">
                                        <h3 class="mb-0">Contato</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="telefone_fixo" class="form-label required">Telefone fixo</label>
                                        <input type="text" id="telefone_fixo" name="telefone_fixo" class="form-control format-telefone" value="{{ old('telefone_fixo', $ong->telefone_fixo ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="email_principal" class="form-label required">E-mail principal</label>
                                        <input type="email" id="email_principal" name="email_principal" class="form-control" value="{{ old('email_principal', $ong->email_principal ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="site" class="form-label">Site</label>
                                        <input type="text" id="site" name="site" class="form-control" value="{{ old('site', $ong->site ?? '') }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col d-flex align-items-center">
                                        <h3 class="mb-0">Responsável legal</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="nome_completo_responsavel" class="form-label required">Nome completo</label>
                                        <input type="text" id="nome_completo_responsavel" name="nome_completo_responsavel" class="form-control" value="{{ old('nome_completo_responsavel', $ong->nome_completo_responsavel ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="cpf_responsavel" class="form-label required">CPF</label>
                                        <input type="text" id="cpf_responsavel" name="cpf_responsavel" class="form-control format-cpf" value="{{ old('cpf_responsavel', $ong->cpf_responsavel ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="cargo_responsavel" class="form-label required">Cargo</label>
                                        <input type="text" id="cargo_responsavel" name="cargo_responsavel" class="form-control" value="{{ old('cargo_responsavel', $ong->cargo_responsavel ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="email_contato" class="form-label required">E-mail de contato</label>
                                        <input type="email" id="email_contato" name="email_contato" class="form-control" value="{{ old('email_contato', $ong->email_contato ?? '') }}" required>
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