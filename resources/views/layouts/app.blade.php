<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- jQuery CDN -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

        <!-- FilePond CSS -->
        <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />

        <!-- FilePond JS -->
        <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

        <!-- Plugins úteis -->
        <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
        <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <main class="page">
            @include('layouts.navigation')

            <div class="min-h-screen bg-gray-100">
                <!-- Page Heading -->
                @if (isset($header))
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif
            </div>

            <!-- Page Content -->
            <div class="page-wrapper">
                {{ $slot }}
            </div>
        </main>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.format-cep').mask('00000-000');
                $('.format-telefone').mask('(00) 00000-0000');
                $('.format-cpf').mask('000.000.000-00', {reverse: true});
                $('.format-cnpj').mask('00.000.000/0000-00', {reverse: true});
            });
        </script>
        <script>
            $(document).ready(function() {
                // Quando o usuário sai do campo CEP
                $('#cep').on('blur', function() {
                    let cep = $(this).val().replace(/\D/g, ''); // remove caracteres não numéricos

                    if (cep.length === 8) {
                        $.getJSON(`https://viacep.com.br/ws/${cep}/json/`, function(data) {
                            if (!("erro" in data)) {
                                $('#logradouro').val(data.logradouro);
                                $('#bairro').val(data.bairro);
                                $('#cidade').val(data.localidade);
                                $('#estado').val(data.uf);
                            } else {
                                alert('CEP não encontrado!');
                            }
                        }).fail(function() {
                            alert('Erro ao consultar o CEP.');
                        });
                    }
                });
            });
        </script>
    </body>
</html>
