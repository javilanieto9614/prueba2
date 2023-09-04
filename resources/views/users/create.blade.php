@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Usuario</h2>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" name="correo" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="clave">Clave</label>
            <input type="password" name="clave" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
