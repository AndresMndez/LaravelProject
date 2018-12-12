@extends('layouts.app')

@section('title')
{{$product->name}}
@endsection

@section('content')
	<article class="main-seller">
			<img src="{{$product->image}}">
			<div class ="product-inside">
			<p><a href=""><strong>{{$product->name}}</strong></a></p>
					<p>${{$product->price}}</p>
					<a href="http://127.0.0.1:8000/cart/add/{{$product->id}}" class="product-add">
							<i class="fas fa-cart-plus"></i>
							<p>Agregar al Carrito</p>
					</a>
			</div>
	</article>

@endsection
