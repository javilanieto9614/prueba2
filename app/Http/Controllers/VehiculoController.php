<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\Auth;
use App\Notifications\AsignacionVehiculoNotification;
use Illuminate\Support\Facades\Notification;

class VehiculoController extends Controller
{

    public function mostrarFormularioCreacion()
    {
        return view('vehiculos.crear');
    }


    public function listaUsuario()
    {
        $usuario = Auth::user();
        $vehiculos = $usuario->vehiculos()->orderBy('modelo')->paginate(10);

        return view('vehiculos.lista_usuario', compact('vehiculos'));
    }

    public function crearSiActivo()
    {
        $usuario = Auth::user();
        if ($usuario->parametro_activo) {
            return view('vehiculos.create');
        } else {
            return redirect()->route('vehiculos.lista_usuario')->with('error', 'No tienes permiso para crear vehículos.');
        }
    }

    public function create()

    {

        return view('vehiculos.create');
    }


    public function index()
    {
        $vehiculos = Vehiculo::all();
        return view('vehiculos.index', compact('vehiculos'));
    }

    public function crear(Request $request)

    {
        dd($request->all());

        // Valida los datos del formulario
        $request->validate([
            'placa' => 'required',
            'modelo' => 'required',
            'users_id' => 'required',
        ]);


        Vehiculo::create([
            'placa' => $request->placa,
            'modelo' => $request->modelo,
            'users_id' => $request->users_id,
        ]);


        return redirect()->route('vehiculos.index');
    }

    public function store(Request $request)
    {

        Vehiculo::create($request->all());
        return redirect()->route('vehiculos.index');
    }

    public function edit($id)
    {
        $vehiculo = Vehiculo::find($id);
        return view('vehiculos.edit', compact('vehiculo'));
    }

    public function update(Request $request, $id)
    {

        $vehiculo = Vehiculo::find($id);
        $vehiculo->update($request->all());
        return redirect()->route('vehiculos.index');
    }

    public function destroy($id)
    {
        $vehiculo = Vehiculo::find($id);
        $vehiculo->delete();
        return redirect()->route('vehiculos.index');
    }

    public function asignarVehiculo($users_id, $vehiculo_id)
    {

        $usuario = User::find($users_id);
        $vehiculo = Vehiculo::find($vehiculo_id);


        Notification::send($usuario, new AsignacionVehiculoNotification($vehiculo));

        return redirect()->route('vehiculos.index');
    }
}
