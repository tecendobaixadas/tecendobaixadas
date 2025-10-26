<x-app-layout>
    <div class="page-header d-print-none" aria-label="Page header">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="col-auto d-flex align-items-center">
                        <a class="btn btn-action" href="{{ route('jovens.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-left">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M5 12l14 0" />
                                <path d="M5 12l4 4" />
                                <path d="M5 12l4 -4" />
                            </svg>
                        </a>
                        <!-- Page pre-title -->
                        <h2 class="page-title">Cadastrar jovem</h2>
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
                            <form method="POST" action="{{ isset($jovem) ? route('jovens.update', $jovem) : route('jovens.store') }}" id="form" enctype="multipart/form-data">
                                @csrf
                                @if(isset($jovem))
                                    @method('PUT')
                                @endif

                                <div class="row">
                                    <div class="col-7 d-flex align-items-center">
                                        <h3 class="mb-0">Dados Pessoais</h3>
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

                                <style>
                                    .avatar-2xl {
                                        --tblr-avatar-size: 5.875rem;
                                        --tblr-avatar-size: 5.875rem;
                                        --tblr-avatar-bg: #DDDDDD;
                                        --tblr-avatar-box-shadow: none;
                                    }
                                </style>

                                <div class="row mb-3">
                                    <div class="col d-flex justify-content-center">

                                        <div class="text-center">
                                            <label for="imagem_perfil" class="text-center cursor-pointer d-block">
                                                <div id="avatarPreview" class="avatar avatar-1 rounded-circle avatar-2xl border-0 mb-1"
                                                    @if(!empty($jovem->imagem_perfil))
                                                        style="background-image: url('{{ asset('storage/' . $jovem->imagem_perfil) }}')"
                                                    @endif>
                                                    @if(empty($jovem->imagem_perfil))
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

                                            <input type="file" id="imagem_perfil" name="imagem_perfil" class="d-none" accept=".jpg,.jpeg,.png,.webp">
                                            <button type="button" id="removerImagem" class="btn btn-outline-danger btn-sm d-none">
                                                Remover imagem
                                            </button>
                                        </div>

                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-3 mb-3">
                                        <label for="nome_completo" class="form-label required">Nome completo</label>
                                        <input type="text" id="nome_completo" name="nome_completo" class="form-control" value="{{ old('nome_completo', $jovem->nome_completo ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="nome_social" class="form-label">Nome social</label>
                                        <input type="text" id="nome_social" name="nome_social" class="form-control" value="{{ old('nome_social', $jovem->nome_social ?? '') }}">
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="email" class="form-label">E-mail</label>
                                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $jovem->email ?? '') }}">
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="telefone" class="form-label required">Telefone com DDD</label>
                                        <input type="text" id="telefone" name="telefone" class="form-control format-telefone" value="{{ old('telefone', $jovem->telefone ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="data_nascimento" class="form-label required">Data de Nascimento</label>
                                        <input type="date" id="data_nascimento" name="data_nascimento" class="form-control" value="{{ old('data_nascimento', isset($jovem->data_nascimento) ? $jovem->data_nascimento->format('Y-m-d') : '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="orientacao_sexual" class="form-label">Gênero e Orientação sexual</label>
                                        <select id="orientacao_sexual" name="orientacao_sexual" class="form-select">
                                            @foreach(['Estudante', 'Trabalhador', 'Estudando e Trabalhando', 'Não trabalho e nem estudo'] as $s)
                                            <option value="{{ $s }}" @selected(old('orientacao_sexual', $jovem->orientacao_sexual ?? '') == $s)>{{ $s }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="genero" class="form-label required">Gênero</label>
                                        <select id="genero" name="genero" class="form-select" required>
                                            @foreach(['Estudante', 'Trabalhador', 'Estudando e Trabalhando', 'Não trabalho e nem estudo'] as $s)
                                            <option value="{{ $s }}" @selected(old('genero', $jovem->genero ?? '') == $s)>{{ $s }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="raca" class="form-label required">Raça</label>
                                        <select id="raca" name="raca" class="form-select" required>
                                            @foreach(['Branca', 'Preta', 'Parda', 'Amarela', 'Indígena'] as $r)
                                            <option value="{{ $r }}" @selected(old('raca', $jovem->raca ?? '') == $r)>{{ $r }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="situacao_atual" class="form-label">Situação Atual</label>
                                        <select id="situacao_atual" name="situacao_atual" class="form-select">
                                            <option value="">Selecione</option>
                                            @foreach(['Desempregado', 'CLT', 'Pessoa Jurídica (PJ)', 'Bolsista', 'Estagiário'] as $opt)
                                            <option value="{{ $opt }}" @selected(old('situacao_atual', $jovem->situacao_atual ?? '') == $opt)>
                                                {{ $opt }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="escolaridade" class="form-label">Escolaridade</label>
                                        <select id="escolaridade" name="escolaridade" class="form-select">
                                            @foreach(['Ens. Fundamental Incompleto', 'Ens. Fundamental', 'Ens. Médio Incompleto', 'Ens. Médio', 'Ensino Técnico Incompleto', 'Ensino Técnico', 'Graduação incompleta', 'Graduação', 'Pós-graduação'] as $s)
                                            <option value="{{ $s }}" @selected(old('escolaridade', $jovem->escolaridade ?? '') == $s)>{{ $s }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="oportunidades" class="form-label">Oportunidades de interesse</label>
                                        <select id="oportunidades" name="oportunidades" class="form-select">
                                            @foreach(['Emprego verde', 'Voluntariado', 'Formações e cursos'] as $s)
                                            <option value="{{ $s }}" @selected(old('oportunidades', $jovem->oportunidades ?? '') == $s)>{{ $s }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="interesse" class="form-label">Área de interesse</label>
                                        <input type="text" id="interesse" name="interesse" class="form-control" value="{{ old('interesse', $jovem->interesse ?? '') }}">
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="portador_deficiencia" class="form-label required">Portador de deficiência?</label>
                                        <select id="portador_deficiencia" name="portador_deficiencia" class="form-select" required>
                                            @foreach(['Sim', 'Não'] as $s)
                                            <option value="{{ $s }}" @selected(old('portador_deficiencia', $jovem->portador_deficiencia ?? '') == $s)>{{ $s }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="estado" class="form-label required">Estado</label>
                                        <input type="text" id="estado" name="estado" class="form-control" value="{{ old('estado', $jovem->estado ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="cidade" class="form-label required">Cidade</label>
                                        <input type="text" id="cidade" name="cidade" class="form-control" value="{{ old('cidade', $jovem->cidade ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="portfolio" class="form-label">Portfólio</label>
                                        <input type="file" id="portfolio" name="portfolio" class="form-control @error('portfolio') is-invalid @enderror" value="{{ old('portfolio', $jovem->portfolio ?? '') }}" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg">
                                        @error('portfolio')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                        @if(isset($jovem->portfolio))
                                            <a href="{{ Storage::url($jovem->portfolio) }}" target="_blank" class="btn btn-dark btn-sm mt-3">
                                                Visualizar
                                            </a>
                                        @endif

                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col d-flex align-items-center">
                                        <h3 class="mb-0">Redes sociais</h3>
                                    </div>
                                </div>

                                <!-- Template base (oculto) -->
                                <div class="row mb-2 rede-item template">
                                    <div class="col-md-3">
                                        <label class="form-label">Rede</label>
                                        <select name="rede[0][nome]" class="form-select">
                                            <option value="">Selecione</option>
                                            @foreach(['Facebook', 'Instagram', 'LinkedIn', 'Twitter'] as $s)
                                                <option value="{{ $s }}" @if(isset($jovem->redes[0]) && $jovem->redes[0]->rede == $s) selected @endif>{{ $s }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label">Link</label>
                                        <input type="text" name="rede[0][link]" class="form-control" value="{{ $jovem->redes[0]->link ?? '' }}">
                                    </div>

                                    <div class="col-md-3 d-flex align-items-end">
                                        <button type="button" class="btn btn-action px-3 add-rede-btn" id="addRedeBtn">Adicionar Rede Social</button>
                                        <button type="button" class="btn btn-ghost btn-danger remove-rede d-none">Remover</button>
                                    </div>
                                </div>

                                <!-- Wrapper onde as redes restantes serão exibidas -->
                                <div id="redesWrapper">
                                    @if($jovem->redes && $jovem->redes->count() > 1)
                                        @foreach($jovem->redes->slice(1) as $index => $rede)
                                            <div class="row mb-2 rede-item">
                                                <div class="col-md-3">
                                                    <label class="form-label">Rede</label>
                                                    <select name="rede[{{ $index }}][nome]" class="form-select">
                                                        <option value="">Selecione</option>
                                                        @foreach(['Facebook', 'Instagram', 'LinkedIn', 'Twitter'] as $s)
                                                            <option value="{{ $s }}" @selected($rede->rede == $s)>{{ $s }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="form-label">Link</label>
                                                    <input type="text" name="rede[{{ $index }}][link]" class="form-control" value="{{ $rede->link }}">
                                                </div>

                                                <div class="col-md-3 d-flex align-items-end">
                                                    <button type="button" class="btn btn-ghost btn-danger remove-rede">Remover</button>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            const $input = $('#imagem_perfil');
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

    <!-- Redes Wrapper -->
    <script>
        $(document).ready(function(){
            function updateIndexes() {
                $('#redesWrapper .rede-item').each(function(index) {
                    index++;
                    $(this).find('select').attr('name', 'rede[' + index + '][nome]');
                    $(this).find('input').attr('name', 'rede[' + index + '][link]');
                });
            }

            function addRedeRow() {
                var newRow = $('.rede-item.template').clone();
                newRow.removeClass('template d-none');
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

</x-app-layout>