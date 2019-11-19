@extends('templades.principal')

@section('conteudo')
    <div class="container mt-2">
            @if (isset($resul))
            <div class="row w-100">   
                <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
                    {{ $resul }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
        <h1 class="text-center">Adicionar Item</h1>
        <hr>
        @if ($add == 'chapas')
            <div class="card">
                <div class="card-body">
                    @component('componente.estoque.compEstoqueChapa', [
                        'estantes' => $estantes, 
                        'fornecedores' => $fornecedores
                    ])
                    @endcomponent
                </div>
            </div>
        @elseif ($add == 'geral')
            <div class="card">
                <div class="card-body">
                    @component('componente.estoque.compEstoqueGeral', [
                        'estantes' => $estantes, 
                        'fornecedores' => $fornecedores
                    ])
                    @endcomponent
                </div>
            </div>
        @elseif ($add == 'tecido') 
            <div class="card">
                <div class="card-body">
                    @component('componente.estoque.compEstoqueTecido', [
                        'estantes' => $estantes, 
                        'fornecedores' => $fornecedores
                    ])
                    @endcomponent
                </div>
            </div>
        @elseif ($add == 'cola') 
            <div class="card">
                <div class="card-body">
                    @component('componente.estoque.compEstoqueCola', [
                        'estantes' => $estantes, 
                        'fornecedores' => $fornecedores
                    ])
                    @endcomponent
                </div>
            </div>
        @endif
                
                    
                
    </div>
@endsection