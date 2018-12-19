<nav class="products_categories">
    <h2 style="font-family: 'Montserrat', sans-serif;">Categorias</h2>
    <nav class="home_categories">
        <ul>
          <li><a href="/categories">Todas las categorias</a></li>
          @foreach ($categories as $value)
            <li><a href="/categories/{{$value->name}}">{{$value->name}}</a></li>
          @endforeach
        </ul>
    </nav>
</nav>
