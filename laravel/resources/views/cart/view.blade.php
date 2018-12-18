@extends ('layouts/app')

@section('title')
{{"Cart View"}}
@endsection

@section('content')
  <div class="table-responsive">
    <table class="table .table-hover table-striped table-bordered">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Precio</th>
          <th scope="col">Cantidad</th>
          <th scope="col">Total</th>
          <th scope="col"></th>
        </tr>
      </thead>

      <tbody id="tabla">
        @foreach ($productos as $producto)
          <tr>
            <td>{{ $producto->name }}</td>
            <td id="price">{{ $producto->price }}</td>
            <td>
              <select id="quantity" class="form-control quantity" >
                @for ($i=1; $i < 6; $i++)
                  @if ($producto->pivot->quantity==$i)
                    <option value="{{$producto->pivot->quantity}}" selected>{{$producto->pivot->quantity}}</option>
                  @else
                    <option value="{{$i}}">{{$i}}</option>
                  @endif
                @endfor

              </select>
            </td>
            <td id="price2">

            </td>
            <td>
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
    </table>
    <form class="" action="/prueba" method="post">
      @csrf
      <button type="submit" name="submit">Comprar</button>
    </form>
  </div>
  <script type="text/javascript" src="/js/carritoPlus.js"></script>
@endsection
