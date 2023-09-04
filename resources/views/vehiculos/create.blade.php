@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Vehículo</h2>
    <form action="{{ route('vehiculos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="usuario_id">Usuario</label>
            <input type="text" name="usuario_id" class="form-control" value="{{ Auth::id() }}" readonly>
        </div>
        <div class="form-group">
            <label for="placa">Placa</label>
            <input type="text" name="placa" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
