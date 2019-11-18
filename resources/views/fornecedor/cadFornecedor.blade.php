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
                <h1 class="card-title text-center">Novo Fornecedor</h1>
            </div>
            <div class="card-body">
                <form action="/fornecedor/novo" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group w-100">
                                <label>Razão Social <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="nome" name="nome" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>CNPJ<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" name="cnpj" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Telefone<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" name="telefone" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>E-mail<span style="color: red;">*</span></label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Inscrição Estadual<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" name="inscEst" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>CEP<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" name="cep" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>Endereço<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" name="endereco" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Cidade<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" name="cidade" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label>Bairro<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" name="bairro" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label>Número<span style="color: red;">*</span></label>
                                <input type="number" class="form-control" name="numero" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label>UF<span style="color: red;">*</span></label>
                                <select name="uf" id="uf" class="form-control">
                                    <option value="" selected>UF</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-outline-primary w-100">Cadastrar</button>
                        </div>
                        <div class="col">
                            <a href="/fornecedor" class="btn btn-outline-danger w-100">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        var listElemento = document.querySelector('#uf');

        function renderUf(ufs) {
            for(uf of ufs) {
                const textElemento = document.createTextNode(uf.sigla)
                const optionElemento = document.createElement('option')
                
                optionElemento.appendChild(textElemento);
                listElemento.appendChild(optionElemento);
            }
        }

        axios.get('https://servicodados.ibge.gov.br/api/v1/localidades/estados')
        .then(function(response) {
            renderUf(response.data);
        })
        .catch(function(error) {
            console.warn(error);
        });
    </script>
@endsection