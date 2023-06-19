<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $cliente = new Cliente();
        $cliente->nombre = $request->input('nombre');
        $cliente->correo = $request->input('correo');
        $cliente->password = bcrypt($request->input('password'));
        $cliente->numero_tarjeta = $request->input('numero_tarjeta');
        $cliente->codigo_cvc = $request->input('codigo_cvc');
        $cliente->save();

        return redirect()->route('clientes.index');
    }

    // Otros métodos del controlador (show, edit, update, destroy) según tus necesidades.
}
