@extends ('layouts/app')
@section('title')
	{{$category[0]->name}}
@endsection
@section ('content')
<div	 class="container_home">
	<div class="containerHomeProducts">
	@if ($category!='[]')
		<h1 class="h1_home">{{$category[0]->name}}</h1>
			<section class="home_products">
			<h2><a href="/categories/{{$category[0]->name}}">{{$category[0]->name}}</a></h2>
			@if (isset($products[0]))
				@foreach ($products as $product)
					<article class="main-seller">
							<img src="{{$product->image}}">
							<div class ="product-inside">
							<p><a href="/categories/{{$category[0]->name}}/{{$product->id}}"><strong>{{$product->name}}</strong></a></p>
									<p>${{$product->price}}</p>
									<a href="http://127.0.0.1:8000/cart/add/{{$product->id}}" class="product-add">
											<i class="fas fa-cart-plus"></i>
											<p>Agregar al Carrito</p>
									</a>
							</div>
					</article>
				@endforeach
			@else
				<article class="home_article">
					<h3>En Esta sección no se encuentran articulos</h3>
				</article>
			@endif
		@else
			<h1 class="h1_home">No Existe dicha categoria</h1>
				<section class="home_products">
		@endif
		</section>
	</div>
@endsection
