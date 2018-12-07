<nav class="home_categories">
    <ul>
      <li><a href="/home">Home</a></li>
      @php
        $nombre = \App\Category::all();
      @endphp
      @foreach ($nombre as $value)
        <li><a href="/{{$value->name}}">{{$value->name}}</a></li>
      @endforeach
    </ul>
</nav>
