@extends('templades.principal')

@section('conteudo')
    <div class="container mt-2">
        <h1 class="text-center">Estoque</h1>
        <hr>
        <div class="card">
            <div class="card-body">
                <div class="row">
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
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card mt-3">
                    <div class="card-header bg-light">
                        <h5 class="card-title text-center">Chapas com baixo Estoque</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>Descrição</th>
                                    <th>Fornecedor</th>
                                    <th>Quantidade</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($chapas as $chapa)
                                    @if ($chapa->qtd <= $chapa->estoque_min)
                                        <tr >
                                            <td> {{ $chapa->descricao }}</td>
                                            <td>
                                                @foreach ($fornecedores as $fornecedor)
                                                    @if ($fornecedor->id === $chapa->fornecedor_id)
                                                        {{ $fornecedor->fornecedor }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td> {{ $chapa->qtd }}UN</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>  
                    <div class="card-footer">
                        <a href="#" class="btn btn-outline-info">Ver Mais</a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card mt-3">
                    <div class="card-header bg-danger text-white">
                        <h5 class="card-title text-center">Baixo Estoque</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>Descrição</th>
                                    <th>Fornecedor</th>
                                    <th>Quantidade</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($chapas as $chapa)
                                    @if ($chapa->qtd <= 1)
                                        <tr >
                                            <td> {{ $chapa->descricao }}</td>
                                            <td>
                                                @foreach ($fornecedores as $fornecedor)
                                                    @if ($fornecedor->id === $chapa->fornecedor_id)
                                                        {{ $fornecedor->fornecedor }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td> {{ $chapa->qtd }}UN</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-outline-danger">Ver Mais</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection