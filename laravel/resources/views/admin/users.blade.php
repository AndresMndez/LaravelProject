@extends('admin.app')

@section('content')

  <h1>Usuarios</h1>
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Tipo</th>
        <th></th>
      </tr>
    </thead>

    <tbody>
      @foreach ($usuarios as $usuario)
        <tr>
          <td>{{ $usuario->name }}</td>
          <td>{{ $usuario->email }}</td>
          <td>
            @if ($usuario->is_admin == 1)
              Administrador
            @else
              Cliente
            @endif
          </td>

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
@endsection
