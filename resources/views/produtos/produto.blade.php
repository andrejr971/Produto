@extends('templades.principal')

@section('conteudo')
    <div class="container mt-2">
        <h1 class="text-center">Produtos</h1>
        <hr>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <a href="/produto/grupo" class="btn btn-info w-100">Novo Grupo</a>
                    </div>
                    <div class="col">
                        <a href="/produto/categoria" class="btn btn-danger w-100">Nova Categoria</a>
                    </div>
                    <div class="col">
                        <a href="/produto/novo" class="btn btn-warning w-100">Novo Produto</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection