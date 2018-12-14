@extends('layouts.applr')

@section('title')
  {{"Cambiar ".$product->name}}
@endsection
@section('content')
	<h1>Cambiar {{$product->name}}</h1>
	<form class="" action="/admin/catalog" method="post" enctype="multipart/form-data">
		@csrf
    @method("post")
			<input type="hidden" name="id" value="{{$product->id}}">
			<label for="name">Name</label>
			<input type="text" name="name" value="{{$product->name}}">
			<label for="description">Description</label>
			<input type="text" name="description" value="{{$product->description}}">
			<label for="price">Price</label>
			<input type="number" name="price" value="{{$product->price}}">
			<img src="{{$product->image}}" alt="" style="width:30px;">
			<input type="file" name="avatar" value="{{$product->image}}">
			<label for="brand">Brand</label>
			<input type="text" name="brand" value="{{$product->brand}}">
			<label for="category">Category</label>
			<input type="text" name="category" value="{{$product->categories[0]->name}}">
			<button type="submit" name="submit">Edit</button>

	</form>
@endsection
