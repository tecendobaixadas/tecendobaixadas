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
                                        <input type="date" name="data_fundacao" class="form-control" value="{{ old('data_fundacao', isset($empresa->data_fundacao) ? $empresa->data_fundacao->format('Y-m-d') : '') }}" required>
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
                                        <input type="text" id="cep" name="cep" class="form-control format-cep" value="{{ old('cep', $empresa->cep ?? '') }}" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label required">Logradouro</label>
                                        <input type="text" id="logradouro" name="logradouro" class="form-control" value="{{ old('logradouro', $empresa->logradouro ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label required">Bairro</label>
                                        <input type="text" id="bairro" name="bairro" class="form-control" value="{{ old('bairro', $empresa->bairro ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label required">Estado</label>
                                        <input type="text" id="estado" name="estado" class="form-control" value="{{ old('estado', $empresa->estado ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label required">Cidade</label>
                                        <input type="text" id="cidade" name="cidade" class="form-control" value="{{ old('cidade', $empresa->cidade ?? '') }}" required>
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
                                        <h3 class="mb-0">Redes sociais</h3>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="row mb-2 rede-item template">
                                        <div class="col-md-3">
                                            <label class="form-label">Rede</label>
                                            <select name="rede[0][nome]" class="form-select">
                                                <option value="">Selecione</option>
                                                @foreach(['Facebook', 'Instagram', 'LinkedIn', 'Twitter'] as $s)
                                                <option value="{{ $s }}">{{ $s }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <label class="form-label">Link</label>
                                            <input type="text" name="rede[0][link]" class="form-control">
                                        </div>

                                        <div class="col-md-3 d-flex align-items-end">
                                            <button type="button" class="btn btn-action px-3 add-rede-btn" id="addRedeBtn">Adicionar Rede Social</button>
                                            <button type="button" class="btn btn-ghost btn-danger remove-rede d-none">Remover</button>
                                        </div>
                                    </div>

                                    <div id="redesWrapper"></div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col d-flex align-items-center">
                                        <h3 class="mb-0">Oportunidades</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="modelo_atuacao" class="form-label required">Modelo de atuação</label>
                                        <select id="modelo_atuacao" name="modelo_atuacao" class="form-select" required>
                                            <option value="">Selecione</option>
                                            @foreach(['Presencial', 'Online', 'Híbrido'] as $opt)
                                            <option value="{{ $opt }}" @selected(old('modelo_atuacao', $empresa->modelo_atuacao ?? '') == $opt)>
                                                {{ $opt }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-2 trabalho-item template">
                                    <div class="col-md-3">
                                        <label class="form-label">Trabalho oferecido</label>
                                        <input type="text" name="trabalhos[]" class="form-control">
                                    </div>

                                    <div class="col-md-3 d-flex align-items-end">
                                        <button type="button" class="btn btn-action px-3 add-trabalho-btn" id="addTrabalhoBtn">Adicionar outro trabalho</button>
                                        <button type="button" class="btn btn-ghost btn-danger remove-trabalho d-none">Remover</button>
                                    </div>
                                </div>

                                <div id="trabalhosWrapper"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Redes Wrapper -->
    <script>
        $(document).ready(function(){

            function updateIndexes() {
                // Reorganiza os índices dos campos name
                $('#redesWrapper .rede-item').each(function(index) {
                    index++;
                    $(this).find('select').attr('name', 'rede[' + index + '][nome]');
                    $(this).find('input').attr('name', 'rede[' + index + '][link]');
                });
            }

            function addRedeRow() {
                var newRow = $('.rede-item.template').clone();
                newRow.removeClass('template');
                newRow.find('input, select').val('');
                newRow.find('.remove-rede').removeClass('d-none');
                newRow.find('.add-rede-btn').remove();
                $('#redesWrapper').append(newRow);
                updateIndexes();
            }

            $('#addRedeBtn').click(function(e){
                e.preventDefault();
                addRedeRow();
            });

            $('#redesWrapper').on('click', '.remove-rede', function(){
                $(this).closest('.rede-item').remove();
                updateIndexes();
            });
        });
    </script>

    <!-- Trabalhos Wrapper -->
    <script>
        $(document).ready(function(){
            function addTrabalhoRow() {
                // Clonar a linha template
                var newRow = $('.trabalho-item.template').clone();
                newRow.removeClass('template'); // remover a classe de template
                newRow.find('input, select').val(''); // limpar valores
                newRow.find('.remove-trabalho').removeClass('d-none'); // mostrar botão remover
                newRow.find('.add-trabalho-btn').remove(); // remover botão "Adicionar" da cópia
                $('#trabalhosWrapper').append(newRow);
            }

            $('#addTrabalhoBtn').click(function(e){
                e.preventDefault();
                addTrabalhoRow();
            });

            // Remover linha (exceto template)
            $('#trabalhosWrapper').on('click', '.remove-trabalho', function(){
                var row = $(this).closest('.trabalho-item');
                if (!row.hasClass('template')) {
                    row.remove();
                } else {
                    alert('Esta linha é o modelo base e não pode ser removida.');
                }
            });
        });
    </script>

</x-app-layout>