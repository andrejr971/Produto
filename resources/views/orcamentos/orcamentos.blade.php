@extends('templades.principal')

@section('conteudo')
    <div class="container">
        <h1 class="text-center">Orcamentos</h1>

        @if (isset($orcamento))
            <div class="card w-50 offset-3">
                <div class="card-header">
                    <h1 class="card-title text-center">Não Há Orçamentos</h1>
                </div>
                <div class="body">
                    <a href="/orcamento/novo" class="btn btn-outline-danger w-100">Orçar</a>
                </div>
            </div>
        @else 
            @foreach ($orcamento as $item)
                {{ $orcamento }}
            @endforeach
        @endif
    </div>
@endsection