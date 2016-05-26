@extends('layouts.app')

@section('content')
    <div class="container mt-50">
        <div class="row">
            <div class="col-md-12">
                <a href="/cliente/cadastrar" class="btn btn-success">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    Cadastrar novo cliente
                </a>
                <hr>
                <table class="table table-bordered table-responsive table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Email</th>
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