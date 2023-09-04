@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Usuario</h2>
    <form action="{{ route('users.update', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $usuario->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" name="correo" class="form-control" value="{{ $usuario->correo }}" required>
        </div>
        <div class="form-group">
            <label for="clave">Clave</label>
            <input type="password" name="clave" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
</div>
@endsection
