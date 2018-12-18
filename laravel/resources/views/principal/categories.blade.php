@extends('layouts.app')
@section('title')
{{'Categorias'}}
@endsection
@section('content')
	<div id="top"	 class="container_home">
		<div class="containerHomeProducts">
			<h1 class="h1_home">{{'Categories'}}</h1>
			@foreach($categories as $category)
				<section class="home_products" id='{{$category->name}}'>
				<h2><a href="/categories/{{$category->name}}">{{$category->name}}</a></h2>
					@foreach ($category->products as $product)
						<article class="main-seller">
						@if($category==='[]')
							<div class ="product-inside">
								<p>No se Encuentran articulos para esta categoría</p>
							</div>
						@else
							<img src="{{$product->image}}">
							<div class ="product-inside">
							<p><a href="/categories/{{$category->name}}/{{$product->id}}"><strong>{{$product->name}}</strong></a></p>
									<p>${{$product->price}}</p>
									<a href="http://127.0.0.1:8000/cart/add/{{$product->id}}" class="product-add">
											<i class="fas fa-cart-plus"></i>
											<p>Agregar al Carrito</p>
									</a>
							</div>
						@endif
						</article>
					@endforeach
					<a href="#{{$category->name}}"></a>
					<a href="#top">volver arriba</a>
					<p class="break_line"></p>
				</section>
			@endforeach
		</div>
	</div>

@endsection
