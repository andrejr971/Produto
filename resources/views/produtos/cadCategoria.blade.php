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

        <div class="card">
            <div class="card-header">
                <h1 class="card-title text-center">Nova Categoria</h1>
            </div>
            <div class="card-body">
                <form action="/produto/categoria" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="form-group w-100">
                                    <label>Categoria <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" id="nome" name="nome" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group w-100">
                                    <label>Grupo <span style="color:red;">*</span></label>
                                    <select name="grupo" class="form-control">
                                        <option value="">Esolha um grupo</option>
                                        @foreach ($grupos as $grupo)
                                            <option value="{{ $grupo->id }}">{{ $grupo->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Descrição<span style="color: red;">*</span></label>
                                <textarea class="form-control" id="desc" name="desc" rows="3" required></textarea>
                            </div>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-outline-primary w-25">Cadastrar</button>
                    <a href="/produto" class="btn btn-outline-danger w-25">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
@endsection