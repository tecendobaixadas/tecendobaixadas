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
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ isset($jovem) ? route('jovens.update', $jovem) : route('jovens.store') }}">
                                @csrf
                                @if(isset($jovem))
                                    @method('PUT')
                                @endif

                                <div class="row mb-3">
                                    <div class="col-7 d-flex align-items-center">
                                        <h3 class="mb-0">Dados Pessoais</h3>
                                    </div>
                                    <div class="col-5 d-flex gap-3 justify-content-end align-items-center">
                                        <button type="submit" class="btn btn-dark px-4" form="createForm" id="submitBtn">
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
                                        <input type="text" id="telefone" name="telefone" class="form-control" value="{{ old('telefone', $jovem->telefone ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="data_nascimento" class="form-label required">Data de Nascimento</label>
                                        <input type="date" id="data_nascimento" name="data_nascimento" class="form-control" value="{{ old('data_nascimento', $jovem->data_nascimento ?? '') }}" required>
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
                                            @foreach(['Estudante', 'Trabalhador', 'Estudando e Trabalhando', 'Não trabalho e nem estudo'] as $s)
                                            <option value="{{ $s }}" @selected(old('situacao_atual', $jovem->situacao_atual ?? '') == $s)>{{ $s }}</option>
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
                                        <label for="oportunidades" class="form-label required">Portador de deficiência?</label>
                                        <select id="oportunidades" name="oportunidades" class="form-select" required>
                                            @foreach(['Emprego verde', 'Voluntariado', 'Formações e cursos'] as $s)
                                            <option value="{{ $s }}" @selected(old('oportunidades', $jovem->oportunidades ?? '') == $s)>{{ $s }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="estado" class="form-label">Estado</label>
                                        <input type="text" id="estado" name="estado" class="form-control" value="{{ old('estado', $jovem->estado ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="cidade" class="form-label">Cidade</label>
                                        <input type="text" id="cidade" name="cidade" class="form-control" value="{{ old('cidade', $jovem->cidade ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="portfolio" class="form-label required">Portfólio</label>
                                        <input type="file" id="portfolio" name="portfolio" class="form-control" value="{{ old('portfolio', $jovem->portfolio ?? '') }}" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col d-flex align-items-center">
                                        <h3 class="mb-0">Redes sociais</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="rede" class="form-label required">Rede</label>
                                        <select id="rede" name="rede[]" class="form-select" required>
                                            @foreach(['Emprego verde', 'Voluntariado', 'Formações e cursos'] as $s)
                                            <option value="{{ $s }}" @selected(old('rede', $jovem->rede ?? '') == $s)>{{ $s }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="link" class="form-label">Link</label>
                                        <input type="text" id="link" name="link[]" class="form-control" value="{{ old('link', $jovem->link ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3 d-flex align-items-center">
                                        <a href="#">Adicionar outra rede</a>
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