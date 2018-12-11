@extends('admin.app')


@section('content')
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>Título</th>
        <th>Descripcion</th>
        <th>Marca</th>
        <th>Precio</th>
        <th>Imagenes</th>
        <th></th>
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
    {{$productos->  links()}}

  {{-- {{ $productos->links() }} --}}
@endsection
