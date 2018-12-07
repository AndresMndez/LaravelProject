@extends('/principal/app')

@section('main')
	<main>
		<div	 class="container_home">
			<div class="containerHomeProducts">
				<h1 class="h1_home">{{$product->name}}</h1>
				<!-- ......CONTAINER DEL HOME......... -->
				<article class="home_article">
					<img src="{{$product->image}}" alt="">
					<div class="home_product_inside">
						<h3>${{$product->price}}</h3>
						<h4>{{$product->name}}</h4>
					</div>
					<p>{{$product->description}}</p>
				</article>

						{{-- <section class="home_products">
							<h2><a href="/{{$category->name}}">{{$category->name}}</a></h2>
							<!-- blade para ingresar los articulos de home-->
								@foreach ($products as $product)
									 @if ($product->categories[0]->name==$category->name)
										<article class="home_article">
										<img src="{{$product->image}}" alt="">
										<div class="home_product_inside">
				              <h3>${{$product->price}}</h3>
				              <h4>{{$product->description}}</h4>
				            </div>
									</article>
								@endif
							@endforeach
						</section>

					@endforeach
						{{$categories->links()}}
				</div> --}}


		<!-- .......CATEGORIAS........ -->
		@include ('principal/html/categorias')
		</div>
	</main>
@endsection
