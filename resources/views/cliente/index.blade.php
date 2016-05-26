@extends('layouts.app')

@section('content')
    <div class="container mt-50">
        <div class="row">
            <div class="col-md-12">
                <a href="/cliente/cadastrar" class="btn btn-success">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    Cadastrar novo cliente
                </a>
                <a href="/logout" class="btn btn-danger pull-right">
                    Sair
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                </a>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="col-md-1">ID</th>
                            <th class="col-md-4">Nome</th>
                            <th class="col-md-3">Telefone</th>
                            <th class="col-md-4">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->nome }}</td>
                            <td>{{ $cliente->telefone }}</td>
                            <td>{{ $cliente->email }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection