<form action="/estoque/tecido/add" method="POST">
    @csrf
    <div class="row">
        <div class="col">
            <div class="form-group w-100">
                <label>Descriçao Item <span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="nome" placeholder="EX: TECIDO MOSTARDA" required>
            </div>
        </div>
        <div class="col">
            <div class="form-group w-100">
                <label>OC <span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="ean" placeholder="EX: 00000" required>
            </div>
        </div>
        <div class="col">
            <div class="form-group w-100">
                <label>Metragem <span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="qtd" required>
            </div>
        </div>
        <div class="col-2">
            <div class="form-group w-100">
                <label>Est. MIN <span style="color: red;">*</span></label>
                <input type="number" class="form-control" name="min" value="1" required>
            </div>
        </div>
        <div class="col-2">
            <div class="form-group w-100">
                <label>Est. Ideal <span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="ideal" value="10" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group w-100">
                <label>Código interno (automático)</label>
                <input type="text" class="form-control" name="codInterno" disabled required>
            </div>
        </div>
        <div class="col-2">
            <label>NCM<span style="color: red;">*</span></label>
            <input type="text" class="form-control" name="ncm" placeholder="8 Números" maxlength="8" required>
        </div>
        <div class="col">
            <div class="form-group">
                <label>Fornecedor <span style="color: red;">*</span></label>
                <select name="fornecedor" class="form-control">
                    <option value="" selected>Fornecedores</option>
                    @foreach ($fornecedores as $fornecedor)
                        <option value="{{ $fornecedor->id }}"> {{ $fornecedor->fornecedor }} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col">
            <div class="form-group w-100">
                <label>Nº Prateleira<span style="color: red;">*</span></label>
                <select name="estante" class="form-control">
                    <option value="" selected>Estantes</option>
                    @foreach ($estantes as $estante)
                        <option value="{{ $estante }}">{{ $estante }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group w-100">
                <label>Un. Medida<span style="color: red;">*</span></label>
                <select name="unidade" class="form-control">
                    <option value="UN">UN</option>
                    <option value="CX">CX</option>
                    <option value="RL">RL</option>
                    <option value="MT" selected>MT</option>
                </select>
            </div>
        </div>
        <div class="col">
            <div class="form-group w-100">
                <label>Preço<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="preco" maxlength="8" required>
            </div>
        </div>
        <div class="col">
            <div class="form-group w-100">
                <label>Reservado<span style="color: red;">*</span></label>
                <div class="row">
                    <div class="form-check-inline">
                        <div class="row">
                            <div class="col">
                                <label for="sim">Sim</label>
                            </div>
                            <div class="col">
                                    <input type="radio" id="sim" class="form-check-input" value="sim" name="reservado" required>
                            </div>
                            <div class="col">
                                <label for="nao">Não</label>
                            </div>
                            <div class="col">
                                <input type="radio" id="nao" class="form-check-input" value="nao" name="reservado" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <label>Pedido</label>
            <input type="text" class="form-control" name="pedido">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-outline-primary w-100">Cadastrar</button>
        </div>
        <div class="col">
            <a href="/estoque" class="btn btn-outline-danger w-100">Cancelar</a>
        </div>
    </div>
</form>