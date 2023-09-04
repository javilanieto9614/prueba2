<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return view('users.index', compact('usuarios'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        // Validación de datos aquí
        User::create($request->all());
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $usuario = User::find($id);
        return view('users.edit', compact('usuarios'));
    }

    public function update(Request $request, $id)
    {
        // Validación de datos aquí
        $usuario = User::find($id);
        $usuario->update($request->all());
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $usuario = User::find($id);
        $usuario->delete();
        return redirect()->route('users.index');
    }
}
