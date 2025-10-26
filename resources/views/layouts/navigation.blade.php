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
                <svg xmlns="http://www.w3.org/2000/svg" width="126" height="67" viewBox="0 0 126 67" fill="none">
                    <path d="M9.524 4.71138H4.59846V0.428307H19.1609V4.71138H14.2354V30.4098H9.524V4.71138Z" fill="black"/>
                    <path d="M21.442 0.428307H34.2912V4.71138H26.1534V12.6351H32.6208V16.9181H26.1534V26.1267H34.2912V30.4098H21.442V0.428307Z" fill="black"/>
                    <path d="M43.6403 30.8381C41.3846 30.8381 39.6571 30.1957 38.4578 28.9107C37.2871 27.6258 36.7018 25.8127 36.7018 23.4712V7.36688C36.7018 5.02547 37.2871 3.21231 38.4578 1.92738C39.6571 0.642461 41.3846 0 43.6403 0C45.8961 0 47.6093 0.642461 48.78 1.92738C49.9793 3.21231 50.5789 5.02547 50.5789 7.36688V10.5364H46.1245V7.06707C46.1245 5.21107 45.3393 4.28307 43.7688 4.28307C42.1984 4.28307 41.4131 5.21107 41.4131 7.06707V23.8139C41.4131 25.6413 42.1984 26.5551 43.7688 26.5551C45.3393 26.5551 46.1245 25.6413 46.1245 23.8139V19.231H50.5789V23.4712C50.5789 25.8127 49.9793 27.6258 48.78 28.9107C47.6093 30.1957 45.8961 30.8381 43.6403 30.8381Z" fill="black"/>
                    <path d="M53.3977 0.428307H66.2469V4.71138H58.1091V12.6351H64.5765V16.9181H58.1091V26.1267H66.2469V30.4098H53.3977V0.428307Z" fill="black"/>
                    <path d="M68.9573 0.428307H74.868L79.4508 18.3744H79.5365V0.428307H83.7339V30.4098H78.894L73.2404 8.52331H73.1547V30.4098H68.9573V0.428307Z" fill="black"/>
                    <path d="M87.2357 0.428307H94.4312C96.7726 0.428307 98.5287 1.05649 99.6994 2.31286C100.87 3.56923 101.455 5.41095 101.455 7.83802V23.0001C101.455 25.4272 100.87 27.2689 99.6994 28.5253C98.5287 29.7816 96.7726 30.4098 94.4312 30.4098H87.2357V0.428307ZM94.3456 26.1267C95.1165 26.1267 95.7019 25.8983 96.1016 25.4415C96.5299 24.9846 96.7441 24.2422 96.7441 23.2143V7.62387C96.7441 6.59593 96.5299 5.85353 96.1016 5.39667C95.7019 4.93981 95.1165 4.71138 94.3456 4.71138H91.947V26.1267H94.3456Z" fill="black"/>
                    <path d="M111.446 30.8381C109.133 30.8381 107.363 30.1814 106.135 28.8679C104.907 27.5544 104.293 25.6984 104.293 23.2999V7.53821C104.293 5.13969 104.907 3.28369 106.135 1.97021C107.363 0.656738 109.133 0 111.446 0C113.759 0 115.529 0.656738 116.757 1.97021C117.985 3.28369 118.598 5.13969 118.598 7.53821V23.2999C118.598 25.6984 117.985 27.5544 116.757 28.8679C115.529 30.1814 113.759 30.8381 111.446 30.8381ZM111.446 26.5551C113.073 26.5551 113.887 25.5699 113.887 23.5997V7.23839C113.887 5.26818 113.073 4.28307 111.446 4.28307C109.818 4.28307 109.004 5.26818 109.004 7.23839V23.5997C109.004 25.5699 109.818 26.5551 111.446 26.5551Z" fill="black"/>
                    <path d="M0 36.1206H7.1099C9.53698 36.1206 11.3073 36.6917 12.4209 37.8338C13.5345 38.9474 14.0913 40.6749 14.0913 43.0163V44.2156C14.0913 45.7575 13.8343 47.0139 13.3204 47.9847C12.8349 48.9555 12.0783 49.6551 11.0503 50.0834V50.1691C13.3917 50.9686 14.5624 53.053 14.5624 56.4223V58.9922C14.5624 61.305 13.9485 63.0754 12.7207 64.3032C11.5215 65.5025 9.75113 66.1021 7.40972 66.1021H0V36.1206ZM6.5531 48.3273C7.49538 48.3273 8.19495 48.0846 8.65181 47.5992C9.13722 47.1138 9.37993 46.3 9.37993 45.1579V43.4875C9.37993 42.4024 9.18005 41.6172 8.7803 41.1318C8.4091 40.6464 7.80947 40.4037 6.98141 40.4037H4.71138V48.3273H6.5531ZM7.40972 61.819C8.23778 61.819 8.85168 61.6049 9.25144 61.1766C9.65119 60.7197 9.85107 59.9487 9.85107 58.8637V56.251C9.85107 54.8804 9.60836 53.9382 9.12295 53.4242C8.66608 52.8817 7.89513 52.6104 6.81009 52.6104H4.71138V61.819H7.40972Z" fill="black"/>
                    <path d="M20.9569 36.1206H27.3387L32.2214 66.1021H27.51L26.6534 60.1486V60.2343H21.2996L20.443 66.1021H16.0742L20.9569 36.1206ZM26.0966 56.1654L23.9979 41.3459H23.9123L21.8564 56.1654H26.0966Z" fill="black"/>
                    <path d="M34.5072 36.1206H39.2186V66.1021H34.5072V36.1206Z" fill="black"/>
                    <path d="M46.9017 50.7687L41.7191 36.1206H46.6875L49.857 45.8003H49.9426L53.1978 36.1206H57.6522L52.4696 50.7687L57.9091 66.1021H52.9408L49.5143 55.6514H49.4287L45.9165 66.1021H41.4622L46.9017 50.7687Z" fill="black"/>
                    <path d="M63.8713 36.1206H70.2531L75.1358 66.1021H70.4244L69.5678 60.1486V60.2343H64.214L63.3574 66.1021H58.9886L63.8713 36.1206ZM69.011 56.1654L66.9123 41.3459H66.8266L64.7708 56.1654H69.011Z" fill="black"/>
                    <path d="M77.4216 36.1206H84.6171C86.9585 36.1206 88.7146 36.7488 89.8853 38.0051C91.056 39.2615 91.6414 41.1032 91.6414 43.5303V58.6924C91.6414 61.1194 91.056 62.9612 89.8853 64.2175C88.7146 65.4739 86.9585 66.1021 84.6171 66.1021H77.4216V36.1206ZM84.5315 61.819C85.3024 61.819 85.8878 61.5906 86.2875 61.1337C86.7158 60.6769 86.93 59.9345 86.93 58.9065V43.3161C86.93 42.2882 86.7158 41.5458 86.2875 41.0889C85.8878 40.6321 85.3024 40.4037 84.5315 40.4037H82.1329V61.819H84.5315Z" fill="black"/>
                    <path d="M98.3785 36.1206H104.76L109.643 66.1021H104.932L104.075 60.1486V60.2343H98.7211L97.8645 66.1021H93.4958L98.3785 36.1206ZM103.518 56.1654L101.419 41.3459H101.334L99.2779 56.1654H103.518Z" fill="black"/>
                    <path d="M117.928 66.5304C115.644 66.5304 113.916 65.8879 112.746 64.603C111.575 63.2895 110.989 61.4193 110.989 58.9922V57.279H115.444V59.3348C115.444 61.2765 116.258 62.2473 117.885 62.2473C118.685 62.2473 119.284 62.0189 119.684 61.562C120.112 61.0766 120.327 60.3057 120.327 59.2492C120.327 57.9928 120.041 56.8935 119.47 55.9512C118.899 54.9804 117.842 53.8239 116.3 52.4819C114.359 50.7687 113.003 49.2268 112.232 47.8562C111.461 46.4571 111.075 44.8866 111.075 43.1448C111.075 40.7749 111.675 38.9474 112.874 37.6625C114.073 36.349 115.815 35.6923 118.099 35.6923C120.355 35.6923 122.054 36.349 123.196 37.6625C124.367 38.9474 124.952 40.8034 124.952 43.2305V44.4726H120.498V42.9307C120.498 41.9027 120.298 41.1603 119.898 40.7035C119.499 40.2181 118.913 39.9753 118.142 39.9753C116.572 39.9753 115.787 40.9319 115.787 42.845C115.787 43.9301 116.072 44.9437 116.643 45.886C117.243 46.8283 118.314 47.9704 119.855 49.3124C121.826 51.0257 123.182 52.5819 123.924 53.981C124.667 55.3801 125.038 57.022 125.038 58.9065C125.038 61.3622 124.424 63.2467 123.196 64.5602C121.997 65.8737 120.241 66.5304 117.928 66.5304Z" fill="black"/>
                </svg>
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
                    <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"> </span>
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

                                @endrole

                                @role('jovem')

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
