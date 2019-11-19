<?php

namespace App\Http\Controllers;

use App\EstoqueChapa;
use App\EstoqueColaTinta;
use App\EstoqueGeral;
use App\Estoque;
use App\EstoqueTecidoCostura;
use Illuminate\Http\Request;
use App\Fornecedor;

class ControladorEstoque extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('estoque.estoque', [
            'chapas' => EstoqueChapa::all(),
            'fornecedores' => Fornecedor::all(),
            'gerais' => EstoqueGeral::all(),
            'tecidos' => EstoqueTecidoCostura::all(),
            'colas' => EstoqueColaTinta::all(),
            'estoque' => Estoque::all()
        ]);
    }

    public function indexView()
    {
        return view('estoque.estoqueFinal', [
            'estoque' => Estoque::all()
        ]);
    }

    public function chapasIndex() {
        return view('estoque.chapas', [
            'chapas' => EstoqueChapa::all(),
            'fornecedores' => Fornecedor::all()
        ]);
    }

    public function EstoqueGeralIndex() {
        return view('estoque.geral', [
            'geral' => EstoqueGeral::all(),
            'fornecedores' => Fornecedor::all()
        ]);
    }

    public function EstoqueTecidoIndex() {
        return view('estoque.tecido', [
            'tecidos' => EstoqueTecidoCostura::all(),
            'fornecedores' => Fornecedor::all()
        ]);
    }

    public function EstoqueColaIndex() {
        return view('estoque.cola', [
            'colas' => EstoqueColaTinta::all(),
            'fornecedores' => Fornecedor::all()
        ]);
    }

    public function addItemEstoque() {
        $estantes = ['Escritório', 1, 2, 3, 4, 5, 6, 7, 8, 9];

        return view('estoque.addItem', [
            'add' => 'chapas',
            'estantes' => $estantes,
            'fornecedores' => Fornecedor::all()
        ]);
    }

    public function addItemEstoqueTecido() {
        $estantes = ['Escritório', 1, 2, 3, 4, 5, 6, 7, 8, 9];

        return view('estoque.addItem', [
            'add' => 'tecido',
            'estantes' => $estantes,
            'fornecedores' => Fornecedor::all()
        ]);
    }

    public function addItemEstoqueCola() {
        $estantes = ['Escritório', 1, 2, 3, 4, 5, 6, 7, 8, 9];

        return view('estoque.addItem', [
            'add' => 'cola',
            'estantes' => $estantes,
            'fornecedores' => Fornecedor::all()
        ]);
    }


    public function addItemEstoqueGeral() {
        $estantes = ['Escritório', 1, 2, 3, 4, 5, 6, 7, 8, 9];

        return view('estoque.addItem', [
            'add' => 'geral',
            'estantes' => $estantes,
            'fornecedores' => Fornecedor::all()
        ]);
    }

    public function addItemEstoqueGeralPost(Request $request) {
        $estantes = ['Escritório', 1, 2, 3, 4, 5, 6, 7, 8, 9];

        $gerais = EstoqueGeral::all()->last();

        $geral = new EstoqueGeral();
        $geral->descricao = strtoupper($request->input('nome'));

        $cod = str_split(strtoupper($request->input('nome')), 3);

        if($gerais === null) {
            $geral->cod_item = 'GER'.$cod[0].'_001';
        } else {
            $geral->cod_item = 'GER'.$cod[0].'_0'.($gerais->id+1);
        }
        $geral->ean_item = $request->input('ean');
        $geral->estante = $request->input('estante');
        $geral->un_medida = $request->input('unidade');
        $geral->estoque_min = $request->input('min');
        $geral->estoque_ideal = $request->input('ideal');
        $geral->qtd = $request->input('qtd');
        $geral->preco = number_format($request->input('preco'), 2,'.','.');
        $geral->fornecedor_id = $request->input('fornecedor');


        $estoque = new Estoque();
        $estoque->descricao =  $geral->descricao;
        $estoque->cod_item = $geral->cod_item;
        $estoque->qtd = $geral->qtd;
        $estoque->estoque_min = $geral->estoque_min;
        $estoque->un_medida = $geral->un_medida;

        
        $geral->save();
        $estoque->save();

        return view('estoque.addItem', [
            'add' => 'geral',
            'estantes' => $estantes,
            'fornecedores' => Fornecedor::all(),
            'resul' => 'Cadastro com Sucesso'
        ]);

    }

    public function addItemEstoquePost(Request $request) {
        $estantes = ['Escritório', 1, 2, 3, 4, 5, 6, 7, 8, 9];

        $chapas = EstoqueChapa::all()->last();

        $chapa = new EstoqueChapa();
        $chapa->descricao = strtoupper($request->input('nome'));

        $cod = str_split(strtoupper($request->input('nome')), 3);

        if($chapas === null) {
            $chapa->cod_item = 'CHA'.$cod[0].'_001';
        } else {
            $chapa->cod_item = 'CHA'.$cod[0].'_0'.($chapas->id+1);
        }
        $chapa->estoque_min = $request->input('min');
        $chapa->estoque_ideal = $request->input('ideal');
        $chapa->qtd = $request->input('qtd');
        $chapa->largura = $request->input('largura');
        $chapa->altura = $request->input('altura');
        $chapa->area = (($request->input('largura') / 1000) * ($request->input('altura') / 1000) * $chapa->qtd);
        $chapa->preco = $request->input('preco');
        $chapa->fornecedor_id = $request->input('fornecedor');
        $chapa->espessura = $request->input('espessura');

        $estoque = new Estoque();
        $estoque->descricao =  $chapa->descricao;
        $estoque->cod_item = $chapa->cod_item;
        $estoque->qtd = $chapa->qtd;
        $estoque->estoque_min = $chapa->estoque_min;
        $estoque->un_medida = $request->input('unidade');

        $chapa->save();
        $estoque->save();

        return view('estoque.addItem', [
            'add' => 'chapas',
            'estantes' => $estantes,
            'fornecedores' => Fornecedor::all(),
            'resul' => 'Cadastro com Sucesso'
        ]);

    }

    public function addItemEstoqueTecidoPost(Request $request) {
        $estantes = ['Escritório', 1, 2, 3, 4, 5, 6, 7, 8, 9];

        $tecidos = EstoqueTecidoCostura::all()->last();

        $tecido = new EstoqueTecidoCostura();
        $tecido->descricao = strtoupper($request->input('nome'));

        $cod = str_split(strtoupper($request->input('nome')), 3);

        if($tecidos === null) {
            $tecido->cod_item = 'TEC'.$cod[0].'_001';
        } else {
            $tecido->cod_item = 'TEC'.$cod[0].'_0'.($tecidos->id+1);
        }
        $tecido->ean_item = $request->input('ean');
        $tecido->reservado = $request->input('reservado');
        $tecido->metragem = $request->input('qtd');
        $tecido->estante = $request->input('estante');
        $tecido->estoque_min = $request->input('min');
        $tecido->preco = $request->input('preco');
        $tecido->fornecedor_id = $request->input('fornecedor');


        $estoque = new Estoque();
        $estoque->descricao =  $tecido->descricao;
        $estoque->cod_item = $tecido->cod_item;
        $estoque->qtd = $tecido->metragem;
        $estoque->estoque_min = $tecido->estoque_min;
        $estoque->un_medida = $request->input('unidade');

        
        $tecido->save();
        $estoque->save();

        return view('estoque.addItem', [
            'add' => 'tecido',
            'estantes' => $estantes,
            'fornecedores' => Fornecedor::all(),
            'resul' => 'Cadastro com Sucesso'
        ]);

    }

    public function addItemEstoqueColaPost(Request $request) {
        $estantes = ['Escritório', 1, 2, 3, 4, 5, 6, 7, 8, 9];

        $colas = EstoqueColaTinta::all()->last();

        $cola = new EstoqueColaTinta();
        $cola->descricao = strtoupper($request->input('nome'));

        $cod = str_split(strtoupper($request->input('nome')), 3);

        if($colas === null) {
            $cola->cod_item = 'COL'.$cod[0].'_001';
        } else {
            $cola->cod_item = 'COL'.$cod[0].'_0'.($colas->id+1);
        }
        $cola->ean_item = $request->input('ean');
        $cola->estante = $request->input('estante');
        $cola->un_medida = $request->input('unidade');
        $cola->vol = strtoupper($request->input('vol'));
        $cola->estoque_min = $request->input('min');
        $cola->estoque_ideal = $request->input('ideal');
        $cola->qtd = $request->input('qtd');
        $cola->preco = number_format($request->input('preco'), 2,'.','.');
        $cola->fornecedor_id = $request->input('fornecedor');


        $estoque = new Estoque();
        $estoque->descricao =  $cola->descricao;
        $estoque->cod_item = $cola->cod_item;
        $estoque->qtd = $cola->qtd;
        $estoque->estoque_min = $cola->estoque_min;
        $estoque->un_medida = $cola->un_medida;

        
        $cola->save();
        $estoque->save();

        return view('estoque.addItem', [
            'add' => 'cola',
            'estantes' => $estantes,
            'fornecedores' => Fornecedor::all(),
            'resul' => 'Cadastro com Sucesso'
        ]);

    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}