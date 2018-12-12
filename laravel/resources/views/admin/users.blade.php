@extends('layouts.applr')
@section('title')
  {{"Users"}}
@endsection
@section('content')

  <h1>Usuarios</h1>

  <div class="table-responsive">
    <table class="table .table-hover table-striped table-bordered">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Email</th>
          <th scope="col">Tipo</th>
          <th scope="col"></th>
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
  </div>
@endsection
