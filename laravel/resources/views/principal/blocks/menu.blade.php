 <nav class="menu">

    <p class="visible-mobile">Menu</p>

    <ul class="list-menu">
        <li>Home</li>
        <li>Productos</li>
        <li>Ofertas</li>
        <li>Compra</li>
        @auth()
           <li class="nav-item">
             <a class="nav-link disabled" href="/logout">Logout</a>
           </li>
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
