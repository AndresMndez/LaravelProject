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
        </tr>
      </thead>

      <tbody>
          <tr>
            <td><span>El carrito esta vacio</span></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
      </tbody>
    </table>
  </div>
@endsection
