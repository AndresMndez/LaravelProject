<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

     <title>@yield('title')</title>



     <!-- Fonts -->
     <link rel="dns-prefetch" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
     <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Roboto" rel="stylesheet">

     <!-- Styles -->
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
     <link rel="stylesheet" type="text/css" media="screen" href="/css/styles.css" />
     <link rel="stylesheet" type="text/css" media="screen" href="/css/admin-styles.css" />


      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script>
   </head>

   {{-- AQUI TERMINA EL HEAD --}}

  <body>
    <header class="header-admin">
      <ul class="nav_admin">
          <li>Home</li>
          <li>Ordenes</li>
          <li href="admin/catalog">Productos</li>
          <li href="admin/users">Usuarios</li>
      </ul>

    </header>

  {{-- AQUI TERMINA EL HEADER --}}

    <main class="py-4">
        @yield('content')
    </main>

  </body>
</html>
