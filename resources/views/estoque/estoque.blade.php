@extends('templades.principal')

@section('conteudo')
    <div class="container mt-2">
        <h1 class="text-center">Estoque</h1>
        <hr>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-2">
                        <div class="btn-group w-100">
                            <button type="button" class="btn btn-dark">Adicionar Item</button>
                            <button type="button" class="btn btn-dark dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                
                    <div class="col-2">
                        <div class="btn-group w-100">
                            <button type="button" class="btn btn-dark">Ver Estoque</button>
                            <button type="button" class="btn btn-dark dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('verEstoque') }}">Estoque</a>
                                <a class="dropdown-item" href="{{ route('estoqueChapas') }}">Estoque de Chapas</a>
                                <a class="dropdown-item" href="{{ route('Geral') }}">Estoque de Cola/Tinta</a>
                                <a class="dropdown-item" href="{{ route('Tecido') }}">Estoque Geral</a>
                                <a class="dropdown-item" href="{{ route('Cola') }}">Estoque de Tecido/Costura</a>
                            </div>
                        </div>
                    </div>
            </div>
        <div class="row">
            <div class="col-6">
                <div class="card mt-3">
                    <div class="card-header bg-danger text-white">
                        <h5 class="card-title text-center">Produtos com baixo estoque</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-sm table-responsive-sm">
                            <thead class="thead-light">
                                <tr>
                                    <th>Código</th>
                                    <th>Descrição</th>
                                    <th>Quantidade</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $cont = 0 ?>
                                @foreach ($estoque as $key => $item)
                                    @if ($item->qtd <= 1)
                                        <tr >
                                            <td> {{ $item->cod_item }}</td>
                                            <td> {{ $item->descricao }}</td>
                                            <td> {{ $item->qtd }} {{ $item->un_medida }}</td>
                                        </tr>
                                        <?php $cont++ ?>
                                        <?php if($cont === 4) break ?>
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
        <div class="row">
            <div class="col-6">
                <div class="card mt-3">
                    <div class="card-header bg-light">
                        <h5 class="card-title text-center">Chapas com baixo Estoque</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-sm table-responsive-sm">
                            <thead class="thead-light">
                                <tr>
                                    <th>Descrição</th>
                                    <th>Fornecedor</th>
                                    <th>Quantidade</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $cont = 0 ?>
                                @foreach ($chapas as $key => $chapa)
                                    @if ($chapa->qtd <= $chapa->estoque_min)
                                        <tr>
                                            <td> {{ $chapa->descricao }}</td>
                                            <td>
                                                @foreach ($fornecedores as $fornecedor)
                                                    @if ($fornecedor->id === $chapa->fornecedor_id)
                                                        {{ $fornecedor->fornecedor }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td> {{ $chapa->qtd }} UN</td>
                                        </tr>
                                        <?php $cont++ ?>
                                        <?php if($cont === 4) break ?>
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
                    <div class="card-header bg-light">
                        <h5 class="card-title text-center">Estoque Geral com baixo Estoque</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-sm table-responsive-sm">
                            <thead class="thead-light">
                                <tr>
                                    <th>Descrição</th>
                                    <th>Fornecedor</th>
                                    <th>Quantidade</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $cont = 0 ?>
                                @foreach ($gerais as $key => $geral)
                                    @if ($geral->qtd <= $geral->estoque_min)
                                        <tr>
                                            <td> {{ $geral->descricao }}</td>
                                            <td>
                                                @foreach ($fornecedores as $fornecedor)
                                                    @if ($fornecedor->id === $geral->fornecedor_id)
                                                        {{ $fornecedor->fornecedor }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td> {{ $geral->qtd }} {{ $geral->un_medida }}</td>
                                        </tr>
                                        <?php $cont++ ?>
                                        <?php if($cont === 4) break ?>
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
        <div class="row">
            <div class="col-6">
                <div class="card mt-3">
                    <div class="card-header bg-light">
                        <h5 class="card-title text-center">Colas/Tintas com baixo Estoque</h5>
                    </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered table-sm table-responsive-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Descrição</th>
                                        <th>Fornecedor</th>
                                        <th>Quantidade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $cont = 0 ?>
                                    @foreach ($colas as $key => $cola)
                                        @if ($cola->qtd <= $cola->estoque_min)
                                            <tr>
                                                <td> {{ $cola->descricao }}</td>
                                                <td>
                                                    @foreach ($fornecedores as $fornecedor)
                                                        @if ($fornecedor->id === $cola->fornecedor_id)
                                                            {{ $fornecedor->fornecedor }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td> {{ $cola->qtd }}</td>
                                            </tr>
                                            <?php $cont++ ?>
                                            <?php if($cont === 4) break ?>
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
                    <div class="card-header bg-light">
                        <h5 class="card-title text-center">Estoque Tecido/Costura com baixo Estoque</h5>
                    </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered table-sm table-responsive-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Descrição</th>
                                        <th>Fornecedor</th>
                                        <th>Quantidade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $cont = 0 ?>
                                    @foreach ($tecidos as $key => $tecido)
                                        @if ($tecido->metragem <= $tecido->estoque_min)
                                            <tr >
                                                <td> {{ $tecido->descricao }}</td>
                                                <td>
                                                    @foreach ($fornecedores as $fornecedor)
                                                        @if ($fornecedor->id === $tecido->fornecedor_id)
                                                            {{ $fornecedor->fornecedor }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td> {{ $tecido->qtd }}UN</td>
                                            </tr>
                                            <?php $cont++ ?>
                                            <?php if($cont == 3) break ?>
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