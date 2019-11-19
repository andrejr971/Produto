@extends('templades.principal')

@section('conteudo')
    <div class="container mt-2">
        <h1 class="text-center">Estoque Geral</h1>
        <hr>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <a href="/estoque/cola/add" class="btn btn-info w-100">Adicionar Item</a>
                    </div>
                    <div class="col">
                        <div class="btn-group  w-100">
                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Gerar Relatório
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="#">Entrada</a>
                              <a class="dropdown-item" href="#">Saída</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Entrada e Saída</a>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="card mt-3">
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
                                    @foreach ($colas as $item)
                                        <tr >
                                            <td> {{ $item->id }}</td>
                                            <td> {{ $item->descricao }}</td>
                                            <td> {{ $item->cod_item }} </td>
                                            <td> {{ $item->qtd }} UN</td>
                                            <td>
                                                @foreach ($fornecedores as $fornecedor)
                                                    @if ($fornecedor->id === $item->fornecedor_id)
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