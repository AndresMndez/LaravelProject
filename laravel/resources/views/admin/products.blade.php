@extends('layouts.applr')


@section('content')
  <h1>Lista de Productos</h1>

  <div class="table-responsive">

    <table class="table .table-hover table-striped table-bordered">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Título</th>
          <th scope="col">Descripcion</th>
          <th scope="col">Marca</th>
          <th scope="col">Precio</th>
          <th scope="col">Imagenes</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($productos as $producto)
          <tr>
            <td>{{ $producto->name }}</td>
            <td>{{ $producto->description }}</td>
            <td>{{ $producto->brand }}</td>
            <td>{{ $producto->price }}</td>
            <td><img src="{{ $producto->image }}" style="width:20px;"></td>
            <td>
              <a class="btn btn-primary" href="">
                <span class="fa fa-pencil-alt"></span>
              </a>
              <form action="" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                  <span class="fa fa-trash"></span>
                </button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
    {{$productos->  links()}}

  {{-- {{ $productos->links() }} --}}
@endsection
