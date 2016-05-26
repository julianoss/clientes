<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

use App\Http\Requests;

class ClienteController extends Controller
{
    private $cliente;

    /**
     * @param Cliente $cliente
     */
    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    /**
     * @return $this
     */
    public function index()
    {
        $clientes = $this->cliente->all()->sortBy('nome');

        return view('cliente.index')->with('clientes', $clientes);
    }

    public function cadastrar()
    {
        return view('cliente.cadastrar');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Cliente::create($data);

        return redirect('/cliente');
    }
}
