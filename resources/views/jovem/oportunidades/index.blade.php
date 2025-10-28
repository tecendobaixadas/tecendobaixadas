<x-app-layout>
    <div class="page-header d-print-none" aria-label="Page header">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <h2 class="page-title">Oportunidades</h2>
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

            @if ($oportunidades->isEmpty())
                <div class="alert alert-warning mb-0">Nenhum registro encontrado.</div>
            @else

                <div class="row row-cards">
                    <div class="col">

                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <div class="d-flex align-items-center justify-content-end mb-3">
                            <div class="d-flex align-items-center me-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-map">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M3 7l6 -3l6 3l6 -3v13l-6 3l-6 -3l-6 3v-13" />
                                    <path d="M9 4v13" />
                                    <path d="M15 7v13" />
                                </svg>
                                <span class="ms-1">Mapa</span>
                            </div>
                            <div>
                                <label class="form-check form-switch form-switch-3 mb-0">
                                    <input class="form-check-input" type="checkbox">
                                </label>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="row row-cards">

                                    @foreach ($oportunidades as $dado)
                                        <div class="col-md-3">
                                            <div class="card">
                                                <div class="card-body">

                                                    <style>
                                                        .avatar-lg {
                                                            --tblr-avatar-size: 3.438rem;
                                                            --tblr-avatar-size: 3.438rem;
                                                            --tblr-avatar-bg: #DDDDDD;
                                                            --tblr-avatar-box-shadow: none;
                                                        }

                                                        .badge.badge-type {
                                                            position: absolute;
                                                            right: 0;
                                                            border-top-right-radius: 0;
                                                            border-bottom-right-radius: 0;
                                                        }
                                                    </style>

                                                    <div class="d-flex justify-content-between mb-2">
                                                        <span class="avatar avatar-lg">
                                                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M12.5001 6.64062C12.5001 9.87667 9.9303 12.5 6.7603 12.5H1.02051V6.64062C1.02051 3.40458 3.5903 0.78125 6.7603 0.78125C9.9303 0.78125 12.5001 3.40458 12.5001 6.64062Z" fill="#7E7E7E"/>
                                                                <path d="M12.5 18.3594C12.5 15.1233 15.0698 12.5 18.2398 12.5H23.9796V18.3594C23.9796 21.5954 21.4098 24.2187 18.2398 24.2187C15.0698 24.2187 12.5 21.5954 12.5 18.3594Z" fill="#7E7E7E"/>
                                                                <path d="M1.02051 18.3594C1.02051 21.5954 3.5903 24.2187 6.7603 24.2187H12.5001V18.3594C12.5001 15.1233 9.9303 12.5 6.7603 12.5C3.5903 12.5 1.02051 15.1233 1.02051 18.3594Z" fill="#7E7E7E"/>
                                                                <path d="M23.9796 6.64062C23.9796 3.40458 21.4098 0.78125 18.2398 0.78125H12.5V6.64062C12.5 9.87667 15.0698 12.5 18.2398 12.5C21.4098 12.5 23.9796 9.87667 23.9796 6.64062Z" fill="#7E7E7E"/>
                                                            </svg>
                                                        </span>
                                                        
                                                        <div class="text-right">
                                                            <p>Publicada em {{ \Carbon\Carbon::parse($dado->data_inicio)->format('m/Y') }}</p>
                                                            <div class="badge bg-dark-lt badge-type">{{ $dado->tipo }}</div>
                                                        </div>
                                                    </div>

                                                    <h3 class="h1 mb-3">{{ $dado->titulo }}</h3>

                                                    <p class="mb-1">{{ $dado->organizacao->nome_fantasia ?? $dado->organizacao->razao_social ?? $dado->organizacao->nome_organizacao ?? '--' }}</p>

                                                    <div class="d-flex align-items-center mb-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-map-pin">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                            <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                                            <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
                                                        </svg>
                                                        <span class="ms-1">{{ $dado->cidade }} - {{ $dado->estado }}</span>
                                                    </div>

                                                    <p class="text-muted mb-3">{{ \Illuminate\Support\Str::limit($dado->descricao, 150, '...') }}</p>

                                                    <div class="text-center">
                                                        <a href="{{ route('jovem.oportunidades.candidatar', $dado) }}" class="btn btn-outline btn-dark">Quero me candidatar</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>

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

            @endif

        </div>
    </div>
</x-app-layout>