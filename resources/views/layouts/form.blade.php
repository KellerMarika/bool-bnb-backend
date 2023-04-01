<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">



    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
    @vite(['resources/js/autocompleteDropdown.js'])
</head>

<body class="">

    <div id="app" class="container w-75 h-75 border-4 shadow my-5 rounded-4 py-2 px-lg-5 form-container ">
        <main class=" ps-lg-5 p-lg-4 overflow-x-hidden pt-5">

            @yield('content')
        </main>
    </div>
    </div>

</body>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

</html>
