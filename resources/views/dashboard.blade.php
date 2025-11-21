<x-app-layout>

    <style>
        .card-icon {
            background: black;
            padding: 1rem;
            border-radius: 1rem;
            color: white;
        }           
    </style>

    <div class="page-header d-print-none" aria-label="Page header">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">Visão geral</div>
                <h2 class="page-title">Dashboard</h2>
              </div>
            </div>
        </div>
    </div>
@php //dd($estudantes['ativos'], $empresas, $ongs, $oportunidades, $documentos); @endphp
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="me-2 d-inline-block card-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-users"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /><path d="M21 21v-2a4 4 0 0 0 -3 -3.85" /></svg>
                            </div>
                            <div class="card-title d-inline-block">{{ $estudantes['total'] }} Estudantes</div>
                            <div class="card-subtitle d-inline-block"><small>{{ $estudantes['ativos'] }} Ativos / {{ $estudantes['inativos'] }} Inativos</small></div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="me-2 d-inline-block card-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-building-factory-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 21h18" /><path d="M5 21v-12l5 4v-4l5 4h4" /><path d="M19 21v-8l-1.436 -9.574a.5 .5 0 0 0 -.495 -.426h-1.145a.5 .5 0 0 0 -.494 .418l-1.43 8.582" /><path d="M9 17h1" /><path d="M14 17h1" /></svg>
                            </div>
                            <div class="card-title d-inline-block">{{ $empresas['total'] }} Empresas</div>
                            <div class="card-subtitle d-inline-block"><small>{{ $empresas['ativos'] }} Ativos / {{ $empresas['inativos'] }} Inativos</small></div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="me-2 d-inline-block card-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-home-ribbon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16 15h5v7l-2.5 -1.5l-2.5 1.5z" /><path d="M20 11l-8 -8l-9 9h2v7a2 2 0 0 0 2 2h5" /><path d="M9 21v-6a2 2 0 0 1 2 -2h1.5" /></svg>
                            </div>
                            <div class="card-title d-inline-block">{{ $ongs['total'] }} Ongs</div>
                            <div class="card-subtitle d-inline-block"><small>{{ $ongs['ativos'] }} Ativos / {{ $ongs['inativos'] }} Inativos</small></div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="me-2 d-inline-block card-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye-search"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M12 18c-.328 0 -.652 -.017 -.97 -.05c-3.172 -.332 -5.85 -2.315 -8.03 -5.95c2.4 -4 5.4 -6 9 -6c3.465 0 6.374 1.853 8.727 5.558" /><path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /><path d="M20.2 20.2l1.8 1.8" /></svg>
                            </div>
                            <div class="card-title d-inline-block">{{ $oportunidades['total'] }} Oportunidades</div>
                            <div class="card-subtitle d-inline-block"><small>{{ $oportunidades['ativos'] }} Ativos / {{ $oportunidades['inativos'] }} Inativos</small></div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="me-2 d-inline-block card-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-book-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19 4v16h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12z" /><path d="M19 16h-12a2 2 0 0 0 -2 2" /><path d="M9 8h6" /></svg>
                            </div>
                            <div class="card-title d-inline-block">{{ $documentos['total'] }} Documentos</div>
                            <div class="card-subtitle d-inline-block"><small>{{ $documentos['ativos'] }} Ativos / {{ $documentos['inativos'] }} Inativos</small></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
