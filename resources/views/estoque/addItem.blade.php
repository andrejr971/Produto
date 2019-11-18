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
        @if ($add == 'chapas')
            <h1 class="text-center">Adicionar Chapas</h1>
            <hr>
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
            <h1 class="text-center">Adicionar Item</h1>
            <hr>
            <div class="card">
                <div class="card-body">
                    @component('componente.estoque.compEstoqueGeral', [
                        'estantes' => $estantes, 
                        'fornecedores' => $fornecedores
                    ])
                    @endcomponent
                </div>
            </div>
        @endif
                
                    
                
    </div>
@endsection