@extends('templades.principal')

@section('conteudo')
    <div class="container mt-2">
        <h1 class="text-center">Estoque</h1>
        <hr>
        <div class="card">
            <div class="card-body">
                <div class="row mt-1">
                    <div class="col-2">
                        <div class="btn-group w-100">
                            <button type="button" class="btn btn-success">Adicionar Item</button>
                            <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('addChapa') }}">Estoque de Chapas</a>
                                <a class="dropdown-item" href="{{ route('addCola') }}">Estoque de Cola/Tinta</a>
                                <a class="dropdown-item" href="{{ route('addGeral') }}">Estoque Geral</a>
                                <a class="dropdown-item" href="{{ route('addTecido') }}">Estoque de Tecido/Costura</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="card card-body mt-3">
            <table class="table table-striped table-bordered table-sm table-responsive-sm">
                <thead>
                    <tr>
                        <th >ID</th>
                        <th>Descrição</th>
                        <th>Código</th>
                        <th>Quantidade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($estoque as $key => $item)
                        <tr >
                            <td> {{ $item->id }}</td>
                            <td> {{ $item->descricao }}</td>
                            <td> {{ $item->cod_item }} </td>
                            <td> {{ $item->qtd }} {{ $item->un_medida }}</td>
                            <td> 
                                <a href="/estoque/editar/{{ $item->cod_item }}" class="btn btn-info">Editar</a>Alguma ação
                                <button class="btn btn-danger">Apagar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="dlgProduto" tabindex="-1" role="dialog" aria-labelledby="dlgProduto" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form class="form-horizontal" id="formProduto">
                        <div class="modal-header">
                            <h5 class="modal-title">Escolha a Categorias</h5>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="radio" name="categoria" id="radio_chapa" value="chapa" class="form-check-inline" autocomplete="off">
                                <label for="radio_chapa">Estoque Chapas</label>
                                <div class="w-100"></div>
                                <input type="radio" name="categoria" id="radio_geral" value="geral" class="form-check-inline" autocomplete="off">
                                <label for="radio_geral">Estoque Geral</label>
                                <div class="w-100"></div>
                                <input type="radio" name="categoria" id="radio_cola" value="cola" class="form-check-inline" autocomplete="off">
                                <label for="radio_cola">Estoque de Cola/Tinta</label>
                                <div class="w-100"></div>
                                <input type="radio" name="categoria" id="radio_tecido" value="tecido" class="form-check-inline" autocomplete="off">
                                <label for="radio_tecido">Estoque de Tecido/Costura</label>
                                <div class="w-100"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" id="btnCriarItem">Criar</button>
                            <button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

