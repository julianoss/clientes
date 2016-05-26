<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class UsuarioController extends Controller
{
    private $usuario;

    /**
     * UsuarioController constructor.
     * @param $usuario
     */
    public function __construct(User $usuario)
    {
        $this->usuario = $usuario;
    }

    public function login()
    {
        return view('auth.login');
    }
}
