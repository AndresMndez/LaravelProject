<nav class="products_categories">
    <h2 style="font-family: 'Montserrat', sans-serif;">Categorias</h2>
    <nav class="home_categories">
        <ul>
          <li><a href="/home">Home</a></li>
          <li><a href="/categories">Categories</a></li>
          @foreach ($nombre as $value)
            <li><a href="/categories/{{$value->name}}">{{$value->name}}</a></li>
          @endforeach
        </ul>
    </nav>
</nav>
