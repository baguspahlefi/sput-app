<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>SPUT</title>

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href=" {{url('css/styles.css')}} " rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
        <style>
            body {
                background-image:https://parboaboa.com/data/foto_sedang/gojo-satoru.webp; /* Ganti '/path/to/your/image.jpg' dengan path gambar Anda */
                background-size: cover; /* Untuk menyesuaikan gambar dengan layar */
                background-repeat: no-repeat; /* Untuk menghindari pengulangan gambar */
            }
        </style>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])



    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0" 
        style="
                background: url('{{ asset('assets/img/bg-login.jpg') }}');
                background-size: cover;
                background-repeat: no-repeat;
        ">
    
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <div class="d-flex justify-content-center align-items-center">
                    <a href="/" class="d-flex align-items-center"> <!-- Tambah class d-flex, flex-column, dan align-items-center -->
                        <img src="{{ url('assets/img/kpp-logo.png') }}" width="100" alt="">
                        <img src="{{ url('assets/img/astra-logo.png') }}" width="150" alt="">
                    </a>
                    
                </div>
                {{ $slot }}
            </div>
            
        </div>
    </body>
    
</html>
