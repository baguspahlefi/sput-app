<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
        @include('includes.styles')
    </head>
    <body class="sb-nav-fixed">
        @include('includes.navbar')
        
        <div id="layoutSidenav">
            @include('includes.sidenav')
            @yield('content')
        </div>
        @include('includes.footer')
        @include('includes.scripts')
    </body>
</html>