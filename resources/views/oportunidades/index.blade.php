<x-app-layout>
    <div class="page-header d-print-none" aria-label="Page header">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <h2 class="page-title">Oportunidades</h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('oportunidades.create') }}" class="btn btn-dark btn-5 px-0 px-sm-3">
                            <!-- Download SVG icon from http://tabler.io/icons/icon/user-plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-plus">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                <path d="M16 19h6" />
                                <path d="M19 16v6" />
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
                            </svg>
                            <span class="d-none d-sm-flex">Cadastrar oportunidade</span>
                        </a>
                        <!-- <span class="d-none d-sm-inline"> -->
                        <span class="d-none d-sm-none">
                            <a href="#" class="btn btn-1">
                                <!-- Download SVG icon from http://tabler.io/icons/icon/file-export -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file-export">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                    <path d="M11.5 21h-4.5a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v5m-5 6h7m-3 -3l3 3l-3 3" />
                                </svg>
                                Exportar
                            </a>
                        </span>
                    </div>
                    <!-- BEGIN MODAL -->
                    <!-- END MODAL -->
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">

            <div class="row row-cards">
                <div class="col">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form class="row g-2 align-items-end">

                                <div class="col-md-12">
                                    <h3 class="card-title mb-3 d-flex align-items-center">
                                        <span class="mx-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-adjustments-horizontal">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M14 6m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                <path d="M4 6l8 0" />
                                                <path d="M16 6l4 0" />
                                                <path d="M8 12m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                <path d="M4 12l2 0" />
                                                <path d="M10 12l10 0" />
                                                <path d="M17 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                <path d="M4 18l11 0" />
                                                <path d="M19 18l1 0" />
                                            </svg>
                                        </span>
                                        Filtros avançados
                                    </h3>
                                </div>

                                <div class="col-md-3">
                                    <input type="text" id="texto" name="texto" class="form-control" placeholder="Título" value="{{ request('texto') }}">
                                </div>

                                <div class="col-md-2">
                                    <select class="form-select" id="situacao" name="situacao">
                                        <option value="" @selected(request('situacao')=='' )>Tipo</option>
                                        @foreach(['Voluntário', 'Remunerado'] as $opt)
                                        <option value="{{ $opt }}" @selected(request('situacao')) == $opt)>
                                            {{ $opt }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <select class="form-select" id="situacao" name="situacao">
                                        <option value="" @selected(request('situacao')=='' )>Área de atuação</option>
                                        <option value="ativo" @selected(request('situacao')=='ativo' )>Ativo</option>
                                        <option value="inativo" @selected(request('situacao')=='inativo' )>Inativo</option>
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <select class="form-select" id="situacao" name="situacao">
                                        <option value="" @selected(request('situacao')=='' )>Organização</option>
                                        <option value="ativo" @selected(request('situacao')=='ativo' )>Ativo</option>
                                        <option value="inativo" @selected(request('situacao')=='inativo' )>Inativo</option>
                                    </select>
                                </div>

                                <div class="col-md-1">
                                    <select class="form-select" id="status" name="status">
                                        <option value="" @selected(request('situacao')=='')>Status</option>
                                        <option value="true" @selected(request('status') == 'true')>Ativo</option>
                                        <option value="false" @selected(request('status') == 'false')>Inativo</option>
                                    </select>
                                </div>

                                <div class="col-md-2 d-flex gap-2">
                                    <a class="btn btn-outline btn-dark px-4" id="buscarFiltros">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                                <path d="M21 21l-6 -6" />
                                            </svg>
                                        </span>
                                        Buscar
                                    </a>
                                    <a class="btn btn-light px-3" id="limparFiltros">
                                        Limpar
                                    </a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row row-cards">
                <div class="col">

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="card">
                        <table class="table table-hover table-vcenter mb-0">
                            <thead>
                                <tr>
                                    <th class="text-nowrap text-black py-3">Título</th>
                                    <th class="text-nowrap text-black py-3">Tipo</th>
                                    <th class="text-nowrap text-black py-3">Área de atuação</th>
                                    <th class="text-nowrap text-black py-3">Organização</th>
                                    <th class="text-nowrap text-black text-center py-3">Status</th>
                                    <th class="text-nowrap text-black py-3">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($oportunidades->isEmpty())
                                    <tr>
                                        <td colspan="6" class="text-center border-0">Nenhum registro encontrado.</td>
                                    </tr>
                                @else
                                    @foreach($oportunidades as $oportunidade)
                                    <tr>
                                        <td>{{ $oportunidade->titulo }}</td>
                                        <td>{{ $oportunidade->tipo }}</td>
                                        <td>{{ $oportunidade->area_atuacao }}</td>
                                        <td>{{ $oportunidade->organizacao->nome_fantasia ?? $oportunidade->organizacao->razao_social ?? $oportunidade->organizacao->nome_organizacao ?? '--' }}</td>
                                        <td class="text-center">
                                            @if($oportunidade->status === 1)
                                                <span class="badge rounded-pill bg-green-lt badge-lg">Ativo</span>
                                            @else
                                                <span class="badge rounded-pill bg-red-lt badge-lg">Inativo</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('oportunidades.details', $oportunidade) }}" class="btn btn-outline btn-secondary me-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                    <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                                </svg>
                                                Ver detalhes
                                            </a>
                                            <a href="{{ route('oportunidades.edit', $oportunidade) }}" class="btn btn-outline btn-dark me-8">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                    <path d="M16 5l3 3" />
                                                </svg>
                                                Editar
                                            </a>

                                            @if ($oportunidade->status === 1)
                                                <a href="{{ route('oportunidades.disable', $oportunidade) }}">
                                                    <span class="status-btn status-inativo">
                                                        <span class="status-circle"></span>
                                                        Inativar
                                                    </span>
                                                </a>
                                            @else
                                                <a href="{{ route('oportunidades.enable', $oportunidade) }}">
                                                    <span class="status-btn status-ativo">
                                                        Ativar
                                                        <span class="status-circle"></span>
                                                    </span>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>

                        <div class="card-footer d-flex align-items-center">
                            <p class="m-0 text-secondary">
                                Exibindo
                                <span id="end-entry">{{ $oportunidades->lastItem() ?? 0 }}</span>
                                de
                                <span id="total-entry">{{ $oportunidades->total() }}</span>
                                registros
                            </p>
                            <ul class="pagination m-0 ms-auto" id="pagination-custom">
                                {{-- Botão Anterior --}}
                                <li class="page-item {{ $oportunidades->onFirstPage() ? 'disabled' : '' }}" id="prev-page">
                                    <a class="page-link"
                                        href="{{ $oportunidades->onFirstPage() ? 'javascript:void(0);' : $oportunidades->previousPageUrl() }}"
                                        tabindex="-1"
                                        aria-disabled="{{ $oportunidades->onFirstPage() ? 'true' : 'false' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon">
                                            <path d="M15 6l-6 6l6 6"></path>
                                        </svg>
                                        anterior
                                    </a>
                                </li>

                                {{-- Página Atual (somente número) --}}
                                <li class="page-item active" id="current-page">
                                    <a class="page-link" href="javascript:void(0);">
                                        {{ $oportunidades->currentPage() }}
                                    </a>
                                </li>

                                {{-- Botão Próximo --}}
                                <li class="page-item {{ $oportunidades->hasMorePages() ? '' : 'disabled' }}" id="next-page">
                                    <a class="page-link"
                                        href="{{ $oportunidades->hasMorePages() ? $oportunidades->nextPageUrl() : 'javascript:void(0);' }}">
                                        próximo
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon">
                                            <path d="M9 6l6 6l-6 6"></path>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        {{ $oportunidades->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>