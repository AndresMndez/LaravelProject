@extends('layouts')
@section('title')
{{'Categories'}}
@endsection
@section('content')
	<div	 class="container_home">
		<div class="containerHomeProducts">
			<h1 class="h1_home">{{'Categories'}}</h1>
			@foreach($categories as $category)
				<section class="home_products">
				<h2><a href="/cateogries/{{$category->name}}">{{$category->name}}</a></h2>
				@if ($category->name)

				@endif
					@foreach ($products as $product)
						<article class="main-seller">
								<img src="{{$product[0]->image}}">
								<div class ="product-inside">
								<p><a href="/categories/{{$category->name}}/{{$product[0]->id}}"><strong>{{$product[0]->name}}</strong></a></p>
										<p>${{$product[0]->price}}</p>
										<a href="http://127.0.0.1:8000/cart/add/{{$product[0]->id}}" class="product-add">
												<i class="fas fa-cart-plus"></i>
												<p>Agregar al Carrito</p>
										</a>
								</div>
						</article>
					@endforeach
			<section class="home_products">
		@endforeach
		</section>
	</div>

@endsection
