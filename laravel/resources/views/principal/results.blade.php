@extends ('layouts/app')
@section('title')
	{{'Busqueda'}}
@endsection
@section ('content')
	<div	 class="container_home">
		<div class="containerHomeProducts">
			<h1 class="h1_home">La Busqueda por '@if($buscar==''){{'sin especificacón'}}@else{{$buscar}}@endif' dio que:
			@if ($products!='[]')
				tiene estos productos</h1>
				<div class="busqueda">
				@foreach ($products as $product)
					<article class="main-seller">
							<img src="{{$product->image}}">
							<div class ="product-inside">
							<p><strong>{{$product->name}}</strong></p>
									<p>${{$product->price}}</p>
									<a href="http://127.0.0.1:8000/cart/add/{{$product->id}}" class="product-add">
											<i class="fas fa-cart-plus"></i>
											<p>Agregar al Carrito</p>
									</a>
							<h3 class="descriptiontitle">Descripcion del articulo</h3>
							<p class="description">{{$product->description}}</p>
							</div>
					</article>
				@endforeach
			</div>
			@else
			</h1>
				<p> <a href="/home"> No tuvo exito</a> </p>
			@endif
		</div>
	</div>
@endsection
