@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lista de Vehículos</h2>
    <a href="{{ route('vehiculos.create') }}" class="btn btn-primary">Crear Vehículo</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Placa</th>
                <th>Modelo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehiculos as $vehiculo)
            <tr>
                <td>{{ $vehiculo->id }}</td>
                <td>{{ $vehiculo->usuario->name }}</td>
                <td>{{ $vehiculo->placa }}</td>
                <td>{{ $vehiculo->modelo }}</td>
                <td>
                    <a href="{{ route('vehiculos.edit', $vehiculo->id) }}" class="btn btn-success">Editar</a>
                    <form action="{{ route('vehiculos.destroy', $vehiculo->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                    </form>

                    @if (!$vehiculo->asignado)
            <form action="{{ route('vehiculos.asignar', ['usuarioId' => Auth::id(), 'vehiculoId' => $vehiculo->id]) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Asignar</button>
            </form>
        @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
