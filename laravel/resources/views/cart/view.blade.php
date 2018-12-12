@extends ('layouts/app')

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

      <tbody>
        @foreach ($productos as $producto)
          <tr>
            <td>{{ $producto->name }}</td>
            <td>{{ $producto->price }}</td>
            <td>
              <select class="form-control" id="exampleFormControlSelect1">
                @for ($i=1; $i < 6; $i++)
                  <option>{{$i}}</option>
                @endfor
              </select>
            </td>
            <td>
              {{$producto->price}}
            </td>
            <td>
              <a href="/cart/borrar/{{$producto->id}}" class="">
                  <span class="fa fa-trash"></span>
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
