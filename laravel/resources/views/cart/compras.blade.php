@extends ('layouts/app')

@section('title')
{{"Compras Realizadas"}}
@endsection

@section('content')

  	{{"Se realizo la compra con exitos"}}
		@foreach ($carts as $cart)
		<div class="table-responsive">
			<h2>{{$cart->id}}</h2>
			<table class="table .table-hover table-striped table-bordered">
	      <thead class="thead-dark">
	        <tr>
	          <th scope="col">Nombre</th>
	          <th scope="col">Precio</th>
	          <th scope="col">Cantidad</th>
	          <th scope="col">Total</th>
	        </tr>
	      </thead>
				<tbody>
	        @foreach ($cart->products as $producto)
	          <tr>
	            <td>{{$producto->name }}</td>
	            <td id="price">{{ $producto->price }}</td>
	            <td>{{$producto->pivot->quantity}}</td>
	            <td class="finalPrice">{{$producto->pivot->precio*$producto->pivot->quantity}}</td>
	          </tr>
	        @endforeach
	      </tbody>
	    </table>
  	</div>
	@endforeach
@endsection
