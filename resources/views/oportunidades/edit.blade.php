<x-app-layout>
    <div class="page-header d-print-none" aria-label="Page header">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="col-auto d-flex align-items-center">
                        <a class="btn btn-action" href="{{ route('oportunidades.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-left">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M5 12l14 0" />
                                <path d="M5 12l4 4" />
                                <path d="M5 12l4 -4" />
                            </svg>
                        </a>
                        <!-- Page pre-title -->
                        <h2 class="page-title">Editar oportunidade</h2>
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
                            <form method="POST" action="{{ isset($oportunidade) ? route('oportunidades.update', $oportunidade) : route('oportunidades.store') }}" id="form">
                                @csrf
                                @if(isset($oportunidade))
                                    @method('PUT')
                                @endif

                                <div class="row mb-3">
                                    <div class="col-7 d-flex align-items-center">
                                        <h3 class="mb-0">Informações</h3>
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
                                        <label for="titulo" class="form-label required">Título da oportunidade</label>
                                        <input type="text" id="titulo" name="titulo" class="form-control" value="{{ old('titulo', $oportunidade->titulo ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="tipo" class="form-label required">Tipo de oportunidade</label>
                                        <select id="tipo" name="tipo" class="form-select" required>
                                            <option value="">Selecione</option>
                                            @foreach(['Voluntário', 'Remunerado'] as $opt)
                                            <option value="{{ $opt }}" @selected(old('tipo', $oportunidade->tipo ?? '') == $opt)>
                                                {{ $opt }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="area_atuacao" class="form-label required">Área de atuação</label>
                                        <input type="text" id="area_atuacao" name="area_atuacao" class="form-control" value="{{ old('area_atuacao', $oportunidade->area_atuacao ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="organizacao_responsavel" class="form-label required">Organização responsável</label>
                                        <select id="organizacao_responsavel" name="organizacao_responsavel" class="select-optgroups" required>
                                            <option value="">Selecione</option>

                                            <optgroup label="Empresas">
                                                @foreach($empresas as $empresa)
                                                    @php
                                                        $valor = 'empresa|' . $empresa->id;
                                                        $selecionado = old('organizacao_responsavel', $oportunidade->organizacao_type . '|' . $oportunidade->organizacao_id) == $valor;
                                                    @endphp
                                                    <option value="{{ $valor }}" @selected($selecionado)>
                                                        {{ $empresa->nome_fantasia ?? $empresa->razao_social }}
                                                    </option>
                                                @endforeach
                                            </optgroup>

                                            <optgroup label="ONGs">
                                                @foreach($ongs as $ong)
                                                    @php
                                                        $valor = 'ong|' . $ong->id;
                                                        $selecionado = old('organizacao_responsavel', $oportunidade->organizacao_type . '|' . $oportunidade->organizacao_id) == $valor;
                                                    @endphp
                                                    <option value="{{ $valor }}" @selected($selecionado)>
                                                        {{ $ong->nome_organizacao }}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="descricao" class="form-label required">Descrição detalhada</label>
                                        <textarea id="descricao" name="descricao" class="form-control" rows="5" required>{{ old('descricao', $oportunidade->descricao ?? '') }}</textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col d-flex align-items-center">
                                        <h3 class="mb-0">Responsável legal</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="estado" class="form-label required">Estado</label>
                                        <input type="text" id="estado" name="estado" class="form-control" value="{{ old('estado', $oportunidade->estado ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="cidade" class="form-label required">Cidade</label>
                                        <input type="text" id="cidade" name="cidade" class="form-control" value="{{ old('cidade', $oportunidade->cidade ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="formato" class="form-label required">Formato</label>
                                        <input type="text" id="formato" name="formato" class="form-control" value="{{ old('formato', $oportunidade->formato ?? '') }}" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col d-flex align-items-center">
                                        <h3 class="mb-0">Responsável legal</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="data_inicio" class="form-label required">Data de início</label>
                                        <input type="date" id="data_inicio" name="data_inicio" class="form-control" value="{{ old('data_inicio', isset($oportunidade->data_inicio) ? $oportunidade->data_inicio->format('Y-m-d') : '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="data_termino" class="form-label">Data de término</label>
                                        <input type="date" id="data_termino" name="data_termino" class="form-control" value="{{ old('data_termino', isset($oportunidade->data_termino) ? $oportunidade->data_termino->format('Y-m-d') : '') }}">
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="status" class="form-label required">Status</label>
                                        <select class="form-select" id="status" name="status" required>
                                            <option value="">Selecione</option>
                                            <option value="1" @selected(old('status', $oportunidade->status ?? '') == 1)>Ativo</option>
                                            <option value="0" @selected(old('status', $oportunidade->status ?? '') == 0)>Inativo</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var el;
            window.TomSelect &&
            new TomSelect((el = document.getElementById("select-optgroups")), {
                copyClassesToDropdown: false,
                dropdownParent: "body",
                controlInput: "<input>",
                render: {
                    item: function (data, escape) {
                        if (data.customProperties) {
                            return '<div><span class="dropdown-item-indicator">' + data.customProperties + "</span>" + escape(data.text) + "</div>";
                        }
                        return "<div>" + escape(data.text) + "</div>";
                    },
                    option: function (data, escape) {
                        if (data.customProperties) {
                            return '<div><span class="dropdown-item-indicator">' + data.customProperties + "</span>" + escape(data.text) + "</div>";
                        }
                        return "<div>" + escape(data.text) + "</div>";
                    },
                },
            });
        });
    </script>

</x-app-layout>