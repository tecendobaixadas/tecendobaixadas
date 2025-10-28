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
                        <input type="text" id="texto" name="texto" class="form-control" placeholder="Nome, e-mail ou título" value="{{ request('texto') }}">
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
                        <button type="submit" class="btn btn-outline btn-dark px-4" id="buscarFiltros">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                    <path d="M21 21l-6 -6" />
                                </svg>
                            </span>
                            Buscar
                        </button>
                        <a href="{{ route('oportunidades.candidatos') }}" class="btn btn-light px-3">
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
                        <th class="text-nowrap text-black py-3">Nome do jovem</th>
                        <th class="text-nowrap text-black py-3">E-mail</th>
                        <th class="text-nowrap text-black py-3">Data da candidatura</th>
                        <th class="text-nowrap text-black py-3">Título da vaga</th>
                        <th class="text-nowrap text-black py-3">Organização</th>
                        <th class="text-nowrap text-black py-3">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($candidatos->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center border-0">Nenhum registro encontrado.</td>
                        </tr>
                    @else
                        @foreach($candidatos as $candidato)
                            @foreach($candidato->oportunidadesCandidatadas as $vaga)
                            <tr>
                                <td>{{ $candidato->name }}</td>
                                <td>{{ $candidato->email }}</td>
                                <td>
                                    <span class="badge bg-light text-dark">
                                        {{ $vaga->pivot->created_at->format('d/m/Y H:i') }}
                                    </span>
                                </td>
                                <td>{{ $vaga->titulo }}</td>
                                <td>{{ $vaga->organizacao->nome_fantasia ?? $vaga->organizacao->razao_social ?? $vaga->organizacao->nome_organizacao ?? '--' }}</td>
                                <td>
                                    <a href="{{ route('oportunidades.details', $vaga) }}" class="btn btn-outline btn-secondary me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                        </svg>
                                        Ver detalhes
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        @endforeach
                    @endif
                </tbody>
            </table>

            <div class="card-footer d-flex align-items-center">
                <p class="m-0 text-secondary">
                    Exibindo
                    <span id="end-entry">{{ $candidatos->lastItem() ?? 0 }}</span>
                    de
                    <span id="total-entry">{{ $candidatos->total() }}</span>
                    registros
                </p>
                <ul class="pagination m-0 ms-auto" id="pagination-custom">
                    {{-- Botão Anterior --}}
                    <li class="page-item {{ $candidatos->onFirstPage() ? 'disabled' : '' }}" id="prev-page">
                        <a class="page-link"
                            href="{{ $candidatos->onFirstPage() ? 'javascript:void(0);' : $candidatos->previousPageUrl() }}"
                            tabindex="-1"
                            aria-disabled="{{ $candidatos->onFirstPage() ? 'true' : 'false' }}">
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
                            {{ $candidatos->currentPage() }}
                        </a>
                    </li>

                    {{-- Botão Próximo --}}
                    <li class="page-item {{ $candidatos->hasMorePages() ? '' : 'disabled' }}" id="next-page">
                        <a class="page-link"
                            href="{{ $candidatos->hasMorePages() ? $candidatos->nextPageUrl() : 'javascript:void(0);' }}">
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

            {{ $candidatos->links() }}
        </div>
    </div>
</div>