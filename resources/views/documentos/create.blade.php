<x-app-layout>
    <div class="page-header d-print-none" aria-label="Page header">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="col-auto d-flex align-items-center">
                        <a class="btn btn-action" href="{{ route('documentos.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-left">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M5 12l14 0" />
                                <path d="M5 12l4 4" />
                                <path d="M5 12l4 -4" />
                            </svg>
                        </a>
                        <!-- Page pre-title -->
                        <h2 class="page-title">Cadastrar documento</h2>
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
                            <form method="POST" action="{{ isset($documento) ? route('documentos.update', $documento) : route('documentos.store') }}" id="form" enctype="multipart/form-data">
                                @csrf
                                @if(isset($documento))
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
                                        <label for="nome" class="form-label required">Nome do documento</label>
                                        <input type="text" id="nome" name="nome" class="form-control" value="{{ old('nome', $documento->nome ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="tipo" class="form-label required">Tipo</label>
                                        <select id="tipo" name="tipo" class="form-select" required>
                                            <option value="">Selecione</option>
                                            @foreach(['Contrato', 'Relatório'] as $opt)
                                            <option value="{{ $opt }}" @selected(old('tipo', $documento->tipo ?? '') == $opt)>
                                                {{ $opt }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="categoria" class="form-label required">Categoria</label>
                                        <input type="text" id="categoria" name="categoria" class="form-control" value="{{ old('categoria', $documento->categoria ?? '') }}" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="data_emissao" class="form-label required">Data da emissão</label>
                                        <input type="date" id="data_emissao" name="data_emissao" class="form-control" value="{{ old('data_emissao', isset($documento->data_emissao) ? $documento->data_emissao->format('Y-m-d') : '') }}" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="arquivo" class="form-label required">Upload do arquivo</label>
                                        <input type="file" id="arquivo" name="arquivo" class="filepond @error('arquivo') is-invalid @enderror" value="{{ old('arquivo', $documento->arquivo ?? '') }}" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" required>
                                        @error('arquivo')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                        @if(isset($documento->arquivo))
                                            <a href="{{ Storage::url($documento->arquivo) }}" target="_blank" class="btn btn-dark btn-sm mt-2">
                                                Visualizar
                                            </a>
                                        @endif
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
        // Transformar o input em FilePond
        const inputArquivo = document.querySelector('#arquivo');
        FilePond.create(inputArquivo, {
            labelIdle: 'Arraste e solte seu arquivo ou <span class="filepond--label-action">procure</span>',
            acceptedFileTypes: [
                'application/pdf',
                'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'image/png',
                'image/jpeg',
                'image/jpg'
            ],
            allowMultiple: false,
            maxFileSize: '2MB',
            server: {
                url: '{{ route("documentos.arquivo.upload") }}',
                process: {
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                revert: null
            }
        });
    </script>

</x-app-layout>