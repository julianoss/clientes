@extends('layouts.app')

@section('content')
    <div class="container mt-50">
        <div class="row">
            <div class="col-md-12">
                <a href="/cliente" class="btn btn-danger">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    Voltar
                </a>
                <hr>
                <div id="errorText" class="text-center text-info hidden">
                    <h6>Por favor, preencha todos os campos.</h6>
                </div>
                <form id="formCadastro" class="form-horizontal" role="form" method="POST" action="{{ url('/cliente/cadastrar') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-md-3 control-label">* Nome</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="nome" value="{{ old('nome') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">* Telefone</label>
                        <div class="col-md-6">
                            <input type="tel" class="form-control" name="telefone">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">* Email</label>
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <button type="submit" class="btn btn-success btn-block">
                                Cadastrar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/js/clienteCadastro.js"></script>
@endsection