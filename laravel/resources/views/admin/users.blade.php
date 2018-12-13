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
          <th scope="col">Accion</th>
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
              <a class="btn btn-primary" href="/admin/user/{{$usuario->id}}">
                <span class="fa fa-pencil-alt"></span>
              </a>
              @if ($usuario->id!=1)
                <form action="/admin/user/delete/{{$usuario->id}}" method="POST">
                  @csrf
                  @method('post')
                  <button type="submit" class="btn btn-danger">
                    <span class="fa fa-trash"></span>
                  </button>
                </form>
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
