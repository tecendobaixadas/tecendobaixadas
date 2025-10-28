<x-app-layout>
    <div class="page-header d-print-none" aria-label="Page header">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <h2 class="page-title">Oportunidades</h2>
                </div>

                @if (Route::is('oportunidades.detalhes'))
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
                @endif

            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">

            <ul class="nav nav-underline mb-3" id="tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link {{ $tab === 'candidatos' ? 'active' : '' }}"
                        href="{{ route('oportunidades.candidatos') }}"
                        id="candidatos-tab" role="tab">
                        Candidatos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $tab === 'detalhes' ? 'active' : '' }}"
                        href="{{ route('oportunidades.detalhes') }}"
                        id="detalhes-tab" role="tab">
                        Detalhes da Oportunidade
                    </a>
                </li>
            </ul>

            @if ($tab === 'detalhes')
                @include('oportunidades.partials.detalhes')
            @else
                @include('oportunidades.partials.candidatos')
            @endif

        </div>
    </div>
</x-app-layout>