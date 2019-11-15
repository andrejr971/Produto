@extends('templades.principal')

@section('conteudo')
    <div class="container mt-2">
        @if (isset($resul))
            <div class="row w-100">   
                <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
                    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h1 class="card-title text-center">Novo Grupo</h1>
            </div>
            <div class="card-body">
                <form action="/produto/grupo" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Nome do Grupo<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="nome" name="nome" required>
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