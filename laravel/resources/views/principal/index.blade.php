@extends('layouts.app')
@section('title'){{'Home'}}
@endsection
@section('content')
  <h1>Mejores Ofertas</h1>

  <section class="best-seller">

      @foreach ($products as $productos)
          <article class="main-seller">
              <img src="{{$productos->image}}">
              <div class ="product-inside">
              <p><a href=""><strong>{{$productos->name}}</strong></a></p>
                  <p>${{$productos->price}}</p>
                  <a href="http://127.0.0.1:8000/cart/add/{{$productos->id}}" class="product-add">
                      <i class="fas fa-cart-plus"></i>
                      <p>Agregar al Carrito</p>
                  </a>
              </div>
          </article>
      @endforeach

  </section>

  <h2 class = "h2-best" style="font-family: 'Montserrat', sans-serif;">Mas    Vendidos</h2>

  <section class="best-seller">

          @foreach ($products as $productos)
          <article class="main-seller">
              <img src="{{$productos->image}}">
              <div class ="product-inside">
              <p><a href=""><strong>{{$productos->name}}</strong></a></p>
                  <p>${{$productos->price}}</p>
                  <div class="product-add">
                      <i class="fas fa-cart-plus"></i>
                      <p>Agregar al Carrito</p>
                  </div>
              </div>
          </article>
      @endforeach
  </section>
  @endsection
