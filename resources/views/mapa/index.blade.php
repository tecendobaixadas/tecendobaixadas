<x-app-layout>
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map {
            height: 50vh;
            width: 100%;
            border-radius: 10px;
        }

        /* Mapa em tons de cinza */
        .leaflet-container {
            filter: grayscale(100%);
        }

        /* Ícones SVG personalizados */
        .custom-marker {
            background-color: #ffffff;
            border-radius: 50%;
            width: 39px;
            height: 39px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>

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

            <div id="map"></div>

        </div>
    </div>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        // Inicializa o mapa
        const map = L.map('map').setView([-15.7801, -47.9292], 5);

        // Camada base (mapa cinza)
        const grayscale = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; OpenStreetMap contributors &copy; CARTO',
            subdomains: 'abcd',
            maxZoom: 19
        }).addTo(map);

        // 🔹 Recebe as oportunidades do backend
        const oportunidades = @json($oportunidades);

        // Função para criar ícones SVG personalizados
        const createCustomIcon = () => {
            return L.divIcon({
                iconSize: [39, 39],
                className: 'custom-marker',
                html: `<svg width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="39" height="39" rx="19.5" fill="black"/>
                        <path d="M10.5 28.5H28.5M11.5 28.5V17.5L14 13L19.5 10.5L25 13L27.5 17.5V28.5M16.5 28.5V23.5C16.5 23.2348 16.6054 22.9804 16.7929 22.7929C16.9804 22.6054 17.2348 22.5 17.5 22.5H21.5C21.7652 22.5 22.0196 22.6054 22.2071 22.7929C22.3946 22.9804 22.5 23.2348 22.5 23.5V28.5M17.5 16.5C17.5 17.0304 17.7107 17.5391 18.0858 17.9142C18.4609 18.2893 18.9696 18.5 19.5 18.5C20.0304 18.5 20.5391 18.2893 20.9142 17.9142C21.2893 17.5391 21.5 17.0304 21.5 16.5C21.5 15.9696 21.2893 15.4609 20.9142 15.0858C20.5391 14.7107 20.0304 14.5 19.5 14.5C18.9696 14.5 18.4609 14.7107 18.0858 15.0858C17.7107 15.4609 17.5 15.9696 17.5 16.5Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>`
            });
        };

        const markers = [];

        // Adiciona os marcadores no mapa
        oportunidades.forEach(o => {
            if (!o.latitude || !o.longitude) return;

            const marker = L.marker([o.latitude, o.longitude], { icon: createCustomIcon() }).addTo(map);

            // Gera o link da oportunidade
            const url = `/oportunidades/${o.id}/edit`;

            // Popup com informações detalhadas
            const popupContent = `
                <div style="min-width:250px;">
                    <a href="${url}" target="_blank" 
                        style="font-size:16px; font-weight:bold; color:#000;">
                        ${o.titulo}
                    </a>
                    <p style="margin:4px 0; color:#777;">
                        <strong>Organização:</strong> ${o.organizacao_responsavel ?? 'N/A'}
                    </p>
                    <p style="margin:5px 0; color:#555;">${o.descricao ?? 'Sem descrição disponível.'}</p>
                </div>
            `;

            marker.bindPopup(popupContent);
            markers.push(marker.getLatLng());
        });

        // 🔹 Centraliza o mapa entre os marcadores
        if (markers.length > 0) {
            const bounds = L.latLngBounds(markers);
            map.fitBounds(bounds, { padding: [50, 50] });
        }
    </script>
</x-app-layout>