@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Mis Vehículos</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Placa</th>
                <th>Modelo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehiculos as $vehiculo)
            <tr>
                <td>{{ $vehiculo->id }}</td>
                <td>{{ $vehiculo->placa }}</td>
                <td>{{ $vehiculo->modelo }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('vehiculos.crear_si_activo') }}" class="btn btn-primary">Crear Vehículo</a>

    <!-- Enlaces de paginación -->
    {{ $vehiculos->links() }}
</div>
@endsection
