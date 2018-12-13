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

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
 </head>

<body>
  <header class="main-header">
      <div class="logo">
          <p>LOGO</p>
      </div>

      <div class="contact">
          <div class="contact-info">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <a href="tel:+541166943203">(011) 66943203</a>
              <i class="far fa-envelope"></i>

              <a href="mailto:Andresmndeze@gmail.com">andresmndeze@gmail.com</a>
          </div>
          <div class="searcher">
              <form action="" method="post">
                  <input type="text" name="product" placeholder="buscador de productos">
                  <button type="submit"><i class="fa fa-search"></i></button>
              </form>
          </div>
      </div>

      <div class="amount-bar">
         <a href="/cart/show"><i class="fas fa-cart-plus"></i></a>

           <i class="fas fa-heart"></i>
       </div>

  </header>

  <nav class="menu">

     <p class="visible-mobile">Menu</p>

     <ul class="list-menu">
         <li><a href="/home">Home</a></li>
         <li><a href="#">Productos</a></li>
         <li>Ofertas</li>
         <li>Compra</li>
        @auth()
 		  		<li class="nav-item">
 			    	<a class="nav-link disabled" href="/logout">Logout</a>
 			  	</li>
            @if (Auth::user()->is_admin)
              <li>
                <a class="nav-link disabled" href="/admin/addProduct">Add Products</a>
              </li>
              <li>
                <a class="nav-link disabled" href="/admin/catalog">View All products</a>
              </li>
              <li>
                <a class="nav-link disabled" href="/admin/users">View All users</a>
              </li>
            @endif
 			    @else
	        <li class="nav-item">
 			    	<a class="nav-link disabled" href="/login">Login</a>
 			  	</li>
          <li class="nav-item">
   			    	<a class="nav-link disabled" href="/register">Registrate</a>
 			  	</li>
 		  	@endauth
     </ul>
     <div class="mobile-menu"><i class = "fas fa-bars"></i></div>

 </nav>

  <main class="py-4">

      @yield('content')
  </main>

  <footer>
    <div class="footer">
      <ul class = "footer_list">
        <li><a href="#">Trabajá con nosotros</a></li>
        <li><a href="#">Términos y condiciones</a></li>
        <li><a href="#">Políticas de privacidad</a></li>
        <li><a href="/faqs">Preguntas frecuentes</a></li>
      </ul>
    </div>
  </footer>
</body>
</html>
