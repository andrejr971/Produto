<form action="/estoque/chapas/add" method="POST">
    @csrf
    <div class="row">
        <div class="col">
            <div class="form-group w-100">
                <label>Descriçao Item <span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="nome" placeholder="EX: BRANCO TX" required>
            </div>
        </div>
        <div class="col">
            <div class="form-group w-100">
                <label>Quantidade <span style="color: red;">*</span></label>
                <input type="number" class="form-control" name="qtd" required>
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
    </div>
    <div class="row">
        <div class="col-2">
            <div class="form-group w-100">
                <label>Un. Medida<span style="color: red;">*</span></label>
                <select name="unidade" class="form-control">
                    <option value="" selected>Un. Medidas</option>
                    <option value="UN">UN</option>
                    <option value="CX">CX</option>
                    <option value="RL">RL</option>
                    <option value="MT">MT</option>
                </select>
            </div>
        </div>
        <div class="col">
            <div class="form-group w-100">
                <label>Largura<span style="color: red;">*</span></label>
                <input type="number" class="form-control" name="largura" maxlength="8" required>
            </div>
        </div>
        <div class="col">
            <div class="form-group w-100">
                <label>Altura<span style="color: red;">*</span></label>
                <input type="number" class="form-control" name="altura" maxlength="8" required>
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
                <label>Espessura<span style="color: red;">*</span></label>
                <select name="espessura" class="form-control">
                    <option value="6mm">6mm</option>
                    <option value="9mm">9mm</option>
                    <option value="12mm">12mm</option>
                    <option value="15mm">15mm</option>
                    <option value="18mm">18mm</option>
                    <option value="25mm">25mm</option>
                </select>
            </div>
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