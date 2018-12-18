@extends('layouts.applr')

@section('title')
  {{"Cambiar configuración del usuario ".$user->email}}
@endsection
@section('content')
	<h1>Cambiar Configuración del Usuario {{$user->email}}</h1>
	<form class="" action="/admin/user/change/" method="post" enctype="multipart/form-data">
		@csrf
			<input type="hidden" name="id" value="{{$user->id}}">
			<label for="name">Name</label>
			<input type="text" name="name" value="{{$user->name}}">
			<label for="email">Mail</label>
			<input type="email" name="email" value="{{$user->email}}">
			<label for="is_admin">Opción</label>
			<input type="@php if ($user->id==1) { echo 'hidden';} else { echo "number";} @endphp" name="is_admin" value="{{$user->is_admin}}" onchange="cambios()" style="width:50px;">
      <label id="response" style="width:250px;"></label>
			<button type="submit" name="submit">Edit</button>
	</form>
  <script type="text/javascript" src="/js/edituser.js">

  </script>
@endsection
