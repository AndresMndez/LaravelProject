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

      <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" name="name" value="{{$product->name}}">
      </div>

      <div class="form-group">
        <label for="description">Descripción</label>
        <input type="text" class="form-control" name="description" value="{{$product->description}}">
      </div>

      <div class="form-group">
        <label for="price">Precio</label>
        <input type="number" class="form-control" name="price" value="{{$product->price}}">
      </div>

			<img src="{{$product->image}}" alt="" style="width:30px;">
      <div class="form-group">
        <input type="file" class="form-control-file" name="avatar" value="{{$product->image}}">
      </div>

      <div class="form-group">
        <label for="brand">Marca</label>
        <input type="text" class="form-control" name="brand" value="{{$product->brand}}">
      </div>

      <div class="form-group">
        <label for="category">Categoria</label>
        <input type="text" class="form-control" name="category" value="{{$product->categories[0]->name}}">
      </div>

			<button type="submit" class="btn btn-primary" name="submit">Editar</button>

	</form>
@endsection
