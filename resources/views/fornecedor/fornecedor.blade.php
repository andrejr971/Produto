@extends('templades.principal')

@section('conteudo')
    <div class="container mt-2">
        <h1 class="text-center">Estoque</h1>
        <hr>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <a href="/fornecedor/novo" class="btn btn-info w-100">Novo Fornecedor</a>
                    </div>
                </div>
            </div>
        </div>
        @if (isset($fornecedores))
            <div class="bg-light">
                <div class="table-responsive">
                    <table class="table table-hover mt-3">
                        <thead class="thead-dark">
                            <tr  style="font-size: 0.9em">
                                <th>Fornecedor</th>
                                <th>CNPJ</th>
                                <th>E-mail</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody class="thead-light">
                            @foreach ($fornecedores as $fornecedor)
                                <tr style="font-size: 0.9em">
                                    <td>{{ $fornecedor->fornecedor }}</td>
                                    <td>{{ $fornecedor->cnpj }}</td>
                                    <td>{{ $fornecedor->email }} </td>
                                    <td>
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal{{ $fornecedor->id }}">
                                            Ver
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <h2 class="text-center mt-2">Não Existe Fornecedores no banco</h2>
        @endif
    </div>
    @if (isset($fornecedores))
        @foreach ($fornecedores as $fornecedor)
            <div class="modal fade" id="modal{{ $fornecedor->id }}" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Atualizar Fornecedor</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <td>{{ $fornecedor->fornecedor }}</td>
                        <td>{{ $fornecedor->cnpj }}</td>
                        <td>{{ $fornecedor->email }} </td>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                      <button type="button" class="btn btn-primary">Salvar mudanças</button>
                    </div>
                  </div>
                </div>
            </div>
        @endforeach
    @endif
@endsection