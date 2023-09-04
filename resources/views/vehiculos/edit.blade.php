@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Vehículo</h2>
    <form action="{{ route('vehiculos.update', $vehiculo->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="users_id">Usuario</label>
            <select name="users_id" class="form-control" required>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" @if($usuario->id === $vehiculo->usuario_id) selected @endif>{{ $usuario->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="placa">Placa</label>
            <input type="text" name="placa" class="form-control" value="{{ $vehiculo->placa }}" required>
        </div>
        <div class="form-group">
            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" class="form-control" value="{{ $vehiculo->modelo }}" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
</div>
@endsection
