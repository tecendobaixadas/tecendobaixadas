<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <header class="navbar navbar-expand-md d-print-none">
        <div class="container-xl">
          <!-- BEGIN NAVBAR TOGGLER -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <!-- END NAVBAR TOGGLER -->
          <!-- BEGIN NAVBAR LOGO -->
          <div class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href="{{ route('dashboard') }}" aria-label="Tecendo Baixadas">
                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="126" height="67" viewBox="0 0 126 67" fill="none" class="navbar-brand-image"> -->
                <svg xmlns="http://www.w3.org/2000/svg" width="126" height="63" viewBox="0 0 562.74 280.74"><defs><style>.cls-1{fill:#265bfa;}</style></defs><g id="Camada_2" data-name="Camada 2"><g id="Camada_1-2" data-name="Camada 1"><path class="cls-1" d="M385,192.05q0-37.5,0-75c0-8.67,4.92-13.88,13.58-13.9q56.43-.1,112.85,0c8.35,0,13.22,5,13.31,13.39q.18,18.19,0,36.37c-.09,8-5.21,13-13.21,13.15q-10.87.18-21.75,0c-2.24,0-3,.63-3,2.95-.23,10.21-.31,10.21,9.89,10.21q26.05,0,52.12,0c8.5,0,13.88,5.2,13.9,13.69q.1,37.11,0,74.23c0,8.13-5.29,13.41-13.35,13.42q-56.25,0-112.49,0c-8.34,0-13.11-4.65-13.09-12.48,0-7.34,5.14-12.21,13.15-12.23q48.36-.08,96.73,0c3.3,0,4.44-.67,4.38-4.24-.22-14.62-.17-29.25,0-43.87,0-2.91-.71-3.79-3.72-3.77-19.37.14-38.75-.18-58.11.17-10,.19-14.69-6.91-14.52-14.67.24-11.24,0-22.49.07-33.74,0-9.46,5.18-14.65,14.54-14.68,7,0,14-.07,21,0,2.1,0,2.74-.62,2.81-2.75.34-10.53.41-10.53-10-10.53-25.24,0-50.49.07-75.73-.08-3.5,0-4.59.71-4.58,4.44q.21,67.31.08,134.6c0,8.77-4.48,13.72-12.28,13.72s-12.44-4.67-12.46-12.78Q385,229.91,385,192.05Z"/><path class="cls-1" d="M289.13,103.13c25,0,50,0,75,0,8.9,0,13.91,5.11,13.49,13.32A11.65,11.65,0,0,1,367,127.69a59.74,59.74,0,0,1-6,.18q-65.81,0-131.61-.07c-3.47,0-4.78.62-4.66,4.42.29,8.89.08,8.9,9.07,8.9q26.63,0,53.24,0c9.36,0,14.59,5.22,14.6,14.63q0,55.5,0,111c0,10.47-7.8,16.39-17.05,13.11a10.73,10.73,0,0,1-7.6-9.7,55.43,55.43,0,0,1-.17-5.62c0-31.37-.07-62.74.07-94.11,0-3.47-.95-4.39-4.37-4.36-19.13.15-38.26-.22-57.37.19-10.48.22-15.54-7-15.28-15.19.36-11.12.06-22.25.1-33.37,0-9.73,4.78-14.53,14.51-14.54Q251.82,103.08,289.13,103.13Z"/><path class="cls-1" d="M150.75,121.43l-1.73-.76c-39.75-18.13-70.08-46.3-90.68-84.9-1.19-2.23-.79-3.43.87-5.06Q74,16.09,88.6,1.26c1.72-1.76,2.56-1.61,4.22.05q43.44,43.49,87,86.81c1.95,1.94,2.12,2.93.06,4.94-8.95,8.71-17.7,17.63-26.55,26.45C152.6,120.27,152,121.38,150.75,121.43Z"/><path class="cls-1" d="M90.34,182.45C77.05,169,63.82,155.59,50.49,142.24Q26.12,117.84,1.57,93.61c-2.1-2.08-2.09-3.17,0-5.23Q17.92,72.38,33.92,56c2.1-2.15,2.87-2.08,4.38.54a210.75,210.75,0,0,0,70.1,73.61c6.32,4,12.84,7.7,19.52,11.09,1.56.79,2.57,1.24.76,3C116,156.86,103.34,169.49,90.34,182.45Z"/></g></g></svg>
            </a>
          </div>
          <!-- END NAVBAR LOGO -->
          <div class="navbar-nav flex-row order-md-last">
            <div class="d-none d-md-flex">
              <div class="nav-item dropdown d-none d-md-flex">
                <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications" data-bs-auto-close="outside" aria-expanded="false">
                  <!-- Download SVG icon from http://tabler.io/icons/icon/bell -->
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                    <path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6"></path>
                    <path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>
                  </svg>
                  <!-- <span class="badge bg-red"></span> -->
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                  <div class="card">
                    <div class="card-header d-flex">
                      <h3 class="card-title">Notifications</h3>
                      <div class="btn-close ms-auto" data-bs-dismiss="dropdown"></div>
                    </div>
                    <div class="list-group list-group-flush list-group-hoverable">
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col-auto"><span class="status-dot status-dot-animated bg-red d-block"></span></div>
                          <div class="col text-truncate">
                            <a href="#" class="text-body d-block">Example 1</a>
                            <div class="d-block text-secondary text-truncate mt-n1">Change deprecated html tags to text decoration classes (#29604)</div>
                          </div>
                          <div class="col-auto">
                            <a href="#" class="list-group-item-actions">
                              <!-- Download SVG icon from http://tabler.io/icons/icon/star -->
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon text-muted icon-2">
                                <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path>
                              </svg>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col">
                          <a href="#" class="btn btn-2 w-100"> Archive all </a>
                        </div>
                        <div class="col">
                          <a href="#" class="btn btn-2 w-100"> Mark all as read </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 p-0 px-2" data-bs-toggle="dropdown" aria-label="Open user menu">
                    <span class="avatar avatar-sm"
                        @if(!empty(Auth::user()->logo))
                            style="background-image: url('{{ asset('storage/' . Auth::user()->logo) }}')"
                        @endif> </span>
                    <div class="d-none d-xl-block ps-2">
                        <div>{{ Auth::user()->name }}</div>
                        <div class="mt-1 small text-secondary">{{ ucfirst(Auth::user()->getRoleNames()->first()) }}</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">{{ __('Configurações') }}</a>

                    <a href="{{ route('logout') }}" 
                        class="dropdown-item"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Sair') }}
                    </a>

                    <!-- Formulário oculto -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
          </div>
        </div>
    </header>

    <header class="navbar-expand-md">
        <!-- <div class="collapse navbar-collapse" id="navbar-menu"> -->
        <div class="navbar-collapse" id="navbar-menu">
            <div class="navbar">
                <div class="container-xl">
                    <div class="row flex-column flex-md-row flex-fill align-items-center">
                        <div class="col">
                            <!-- BEGIN NAVBAR MENU -->
                            <ul class="navbar-nav">
                                <li class="nav-item{{ Route::is('dashboard') ? ' active' : '' }}">
                                    <a class="nav-link" href="{{ route('dashboard') }}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler.io/icons/icon/home -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                                <path d="M5 12l-2 0l9 -9l9 9l-2 0"></path>
                                                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">{{ __('Home') }}</span>
                                    </a>
                                </li>
                                
                                @role('admin')

                                <li class="nav-item{{ Route::is('jovens.*') ? ' active' : '' }}">
                                    <a class="nav-link" href="{{ route('jovens.index') }}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler.io/icons/icon/friends -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-friends">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M7 5m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                <path d="M5 22v-5l-1 -1v-4a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4l-1 1v5" />
                                                <path d="M17 5m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                <path d="M15 22v-4h-2l2 -6a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1l2 6h-2v4" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">{{ __('Jovens') }}</span>
                                    </a>
                                </li>
                                <li class="nav-item{{ Route::is('empresas.*') ? ' active' : '' }}">
                                    <a class="nav-link" href="{{ route('empresas.index') }}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler.io/icons/icon/building-arch -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-building-arch">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M3 21l18 0" />
                                                <path d="M4 21v-15a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v15" />
                                                <path d="M9 21v-8a3 3 0 0 1 6 0v8" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">{{ __('Empresas') }}</span>
                                    </a>
                                </li>
                                <li class="nav-item{{ Route::is('ongs.*') ? ' active' : '' }}">
                                    <a class="nav-link" href="{{ route('ongs.index') }}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler.io/icons/icon/building-cottage -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-building-cottage">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M3 21l18 0" />
                                                <path d="M4 21v-11l2.5 -4.5l5.5 -2.5l5.5 2.5l2.5 4.5v11" />
                                                <path d="M12 9m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                <path d="M9 21v-5a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v5" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">{{ __('Ongs') }}</span>
                                    </a>
                                </li>
                                <li class="nav-item{{ Route::is('oportunidades.*') ? ' active' : '' }}">
                                    <a class="nav-link" href="{{ route('oportunidades.index') }}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler.io/icons/icon/layout-list -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-layout-list">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v2a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                                                <path d="M4 14m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v2a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">{{ __('Oportunidades') }}</span>
                                    </a>
                                </li>
                                <li class="nav-item{{ Route::is('documentos.*') ? ' active' : '' }}">
                                    <a class="nav-link" href="{{ route('documentos.index') }}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler.io/icons/icon/file -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">{{ __('Documentos') }}</span>
                                    </a>
                                </li>
                                <li class="nav-item{{ Route::is('mapa.*') ? ' active' : '' }}">
                                    <a class="nav-link" href="{{ route('mapa.index') }}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler.io/icons/icon/map -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-map">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M3 7l6 -3l6 3l6 -3v13l-6 3l-6 -3l-6 3v-13" />
                                                <path d="M9 4v13" />
                                                <path d="M15 7v13" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">{{ __('Mapa') }}</span>
                                    </a>
                                </li>

                                @endrole

                                @role('jovem')

                                <li class="nav-item{{ Route::is('jovem.chat.ia.*') ? ' active' : '' }}">
                                    <a class="nav-link" href="{{ route('jovem.chat.ia.index') }}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler.io/icons/icon/sparkles -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-sparkles">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M16 18a2 2 0 0 1 2 2a2 2 0 0 1 2 -2a2 2 0 0 1 -2 -2a2 2 0 0 1 -2 2zm0 -12a2 2 0 0 1 2 2a2 2 0 0 1 2 -2a2 2 0 0 1 -2 -2a2 2 0 0 1 -2 2zm-7 12a6 6 0 0 1 6 -6a6 6 0 0 1 -6 -6a6 6 0 0 1 -6 6a6 6 0 0 1 6 6z" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">{{ __('Chat com IA') }}</span>
                                    </a>
                                </li>
                                <li class="nav-item{{ Route::is('jovem.oportunidades.*') ? ' active' : '' }}">
                                    <a class="nav-link" href="{{ route('jovem.oportunidades.index') }}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler.io/icons/icon/layout-list -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-layout-list">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v2a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                                                <path d="M4 14m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v2a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">{{ __('Oportunidades') }}</span>
                                    </a>
                                </li>

                                @endrole

                            </ul>
                            <!-- END NAVBAR MENU -->
                        </div>
                        <div class="col col-md-auto">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSettings">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler.io/icons/icon/settings -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                                <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path>
                                                <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">{{ __('Configurações') }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

</nav>
