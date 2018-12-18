@extends('layouts.app')
@section('title')
	{{'Add Products'}}
@endsection
@section('content')
		<form class="" action="/admin/addProduct" enctype="multipart/form-data" style="display:flex;flex-wrap:wrap;flex-direction:column" method='post'>
			@csrf
			@method('post')
			<label for="name">Producto</label>
			<input id="name" type="text" name="name" value="">
			<p id="name"></p>

			<label for="description">Descripción</label>
			<input id="description" type="text" name="description" value="">
			<p id="description"></p>

			<label for="avatar">Imagen</label>
			<input id="avatar" type="file" name="avatar" value="" onchange="avatarfunc()">
			<p id="avatar"></p>

			<label for="price">Precio</label>
			<input id="price" type="number" name="price" value="">
			<p id="price"></p>

			<label for="brand">Marca</label>
			<input id="brand" type="text" name="brand" value="">
			<p id="brand"></p>

			<input id="catid" type="hidden" name="catid" value="">
			<label for="cName">Categoría</label>
			<input id="cName" type="text" name="cName" value="" onblur="blurfunc();">
			<p id="cName"></p>

			<button id="submit" type="submit" name="submit" value="submit" disabled>Agregar</button>
			<p id="submit"></p>
		</form>
		<script type="text/javascript"  src="/js/addProducts.js">

		</script>
@endsection
