@extends('principal/app')

@section('main')
	<main>
		<form class="" action="" enctype="multipart/form-data" style="display:flex;flex-wrap:wrap;flex-direction:column">
			@csrf
			<label for="name">Product</label>
			<input id="name" type="text" name="name" value="">
			<p id="name"></p>

			<label for="description">Description</label>
			<input id="description" type="text" name="description" value="">
			<p id="description"></p>

			<label for="avatar">Image</label>
			<input id="avatar" type="file" name="avatar" value="" onchange="avatarfunc()">
			<p id="avatar"></p>

			<label for="price">Price</label>
			<input id="price" type="number" name="price" value="">
			<p id="price"></p>

			<label for="brand">Brand</label>
			<input id="brand" type="text" name="brand" value="">
			<p id="brand"></p>

			<input id="catid" type="hidden" name="catid" value="">
			<label for="cName">Category</label>
			<input id="cName" type="text" name="cName" value="">
			<p id="cName"></p>

			<button id="submit" type="submit" name="submit" value="submit" disabled>Add</button>
			<p id="submit"></p>
		</form>
		<script type="text/javascript"  src="/js/addProducts.js">

		</script>

	</main>
@endsection
