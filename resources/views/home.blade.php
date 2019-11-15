@extends('templades.principal')

@section('conteudo')
    <div class="container mt-2">
        <div class="row">
            <div class="col mt-2">
                <div class="card">
                    <div class="card-header">
                        <h2 class="title-card text-center">Orçamentos</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <a href="/orcamento/novo" class="btn btn-outline-dark w-100">Novo Orçamento</a>
                            </div>
                            <div class="col mt-2">
                                <a href="/orcamento" class="btn btn-outline-secondary w-100">Orçamentos</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mt-2">
                <div class="card">
                    <div class="card-header">
                        <h2 class="title-card text-center">Produtos</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <a href="/produto/novo" class="btn btn-outline-dark w-100">Novo Produto</a>
                            </div>
                            <div class="col mt-2">
                                <a href="/produto" class="btn btn-outline-secondary w-100">Produtos</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mt-2">
                <div class="card">
                    <div class="card-header">
                        <h2 class="title-card text-center">Estoque</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <a href="/estoque/novo" class="btn btn-outline-dark w-100">Novo Item</a>
                            </div>
                            <div class="col mt-2">
                                <a href="/estoque" class="btn btn-outline-secondary w-100">Estoque</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mt-2">
                <div class="card">
                    <div class="card-header">
                        <h2 class="title-card text-center">Fornecedor</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <a href="/fornecedor/novo" class="btn btn-outline-dark w-100">Novo Fornecedor</a>
                            </div>
                            <div class="col mt-2">
                                <a href="/fornecedor" class="btn btn-outline-secondary w-100">Fornecedores</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection