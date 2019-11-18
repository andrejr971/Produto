@extends('templades.principal')

@section('conteudo')
    <div class="container mt-2">
        <h1 class="text-center">Estoque Chapas</h1>
        <hr>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <a href="/estoque/chapas/add" class="btn btn-info w-100">Adicionar Item</a>
                    </div>
                    <div class="col">
                        <a href="/estoque/chapas" class="btn btn-danger w-100">Estoque Chapas</a>
                    </div>
                    <div class="col">
                        <a href="/estoque/geral" class="btn btn-warning w-100">Estoque Geral</a>
                    </div>
                    <div class="col">
                        <a href="/estoque/tecido" class="btn btn-primary w-100">Estoque Tecido/Costura</a>
                    </div>
                    <div class="col">
                        <a href="/estoque/cola" class="btn btn-secondary w-100">Estoque Cola/Tinta</a>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        @if (isset($fornecedores))
                            <table class="table table-hover mt-3">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Descrição</th>
                                        <th>Código</th>
                                        <th>Quantidade</th>
                                        <th>Fornecedor</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($chapas as $chapa)
                                        <tr >
                                            <td> {{ $chapa->id }}</td>
                                            <td> {{ $chapa->descricao }}</td>
                                            <td> {{ $chapa->cod_item }} </td>
                                            <td> {{ $chapa->qtd }} UN</td>
                                            <td>
                                                @foreach ($fornecedores as $fornecedor)
                                                    @if ($fornecedor->id === $chapa->fornecedor_id)
                                                        {{ $fornecedor->fornecedor }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal{{ $fornecedor->id }}">
                                                    Ver
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection