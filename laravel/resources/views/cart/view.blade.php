@extends ('layouts/app')

@section('title')
{{"Cart View"}}
@endsection

@section('content')
  <div class="table-responsive">
    <table class="table .table-hover table-striped table-bordered">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Producto</th>
          <th scope="col">Precio</th>
          <th scope="col">Cantidad</th>
          <th scope="col">Total</th>
          <th scope="col">Agregar/Eliminar</th>
        </tr>
      </thead>

      <tbody id="tabla">
        @foreach ($productos as $producto)
          <tr>
            <td>{{ $producto->name }}</td>
            <td id="price">{{ $producto->price }}</td>
            <td name="cantidad">
              {{$producto->pivot->quantity}}
            </td>
            <td class="finalPrice" name=price>
              {{$producto->price*$producto->pivot->quantity}}
            </td>
            <td>
              <a href="/cart/add/{{$producto->id}}" style="margin-right: : 50px;"><span class="fas fa-plus-square"></span></a>
              <a href="/cart/borrar/{{$producto->id}}" class="">
                  <span class="fa fa-trash"></span>
              </a>
            </td>
          </tr>
        @endforeach
        <tr>
          <td></td>
          <td></td>
          <td>total</td>
          <td id="total"></td>
          <td></td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td scope="col">Precio total</td>
          <td name="total" scope="col"></td>
        </tr>
      </tfoot>
    </table>
    @if ($productos!='[]')
      <form class="" action="/cart/purchase" method="post">
        @csrf
        <button type="submit" name="submit">Comprar</button>
      </form>
    @else
      <p>No tiene nigun producto en su carrito</p>
    @endif

  </div>
  <script type="text/javascript" src="/js/carritoPlus.js"></script>
@endsection
