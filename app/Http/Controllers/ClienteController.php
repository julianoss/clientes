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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cadastrar()
    {
        return view('cliente.cadastrar');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required',
            'telefone' => 'required',
            'email' => 'required|email',
        ]);

        $data = $request->all();
        Cliente::create($data);

        return redirect('/cliente');
    }
}
