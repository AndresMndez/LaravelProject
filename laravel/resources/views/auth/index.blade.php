@extends('principal/app')

@section('main')
	<main>
		<section>
			<h1>News</h1>
			<ul>
				<li>Expiring Products</li>
				<li>Vigent Promotions</li>
				<li>Sales done</li>
				<li>Example Text</li>
				<li>Example Text</li>
			</ul>
			<nav>
				<ul>
					<li><a href="/admin/addProduct"> Add Products </a></li>
					<li><a href="/admin/catalog"> View and Modify Products </a></li>
					<li><a href="/admin/users"> View and Modify Permisions of Users </a></li>
					
				</ul>
			</nav>
		</section>
	</main>
@endsection
