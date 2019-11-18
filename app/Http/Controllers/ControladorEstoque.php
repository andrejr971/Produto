<?php

namespace App\Http\Controllers;

use App\EstoqueChapa;
use App\EstoqueColaTinta;
use App\EstoqueGeral;
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
            'fornecedores' => Fornecedor::all()
        ]);
    }

    public function chapasIndex() {
        return view('estoque.chapas', [
            'chapas' => EstoqueChapa::all(),
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
            $geral->cod_item = 'CHA'.$cod[0].'/001';
        } else {
            $geral->cod_item = 'CHA'.$cod[0].'/0'.($gerais->id+1);
        }
        $geral->ean_item = $request->input('ean');
        $geral->estante = $request->input('estante');
        $geral->un_medida = $request->input('unidade');
        $geral->estoque_min = $request->input('min');
        $geral->estoque_ideal = $request->input('ideal');
        $geral->qtd = $request->input('qtd');
        $geral->preco = number_format($request->input('preco'), 2,'.','.');
        $geral->fornecedor_id = $request->input('fornecedor');

        $geral->save();

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
            $chapa->cod_item = 'CHA'.$cod[0].'/001';
        } else {
            $chapa->cod_item = 'CHA'.$cod[0].'/0'.($chapas->id+1);
        }
        $chapa->estoque_min = $request->input('min');
        $chapa->estoque_ideal = $request->input('ideal');
        $chapa->qtd = $request->input('qtd');
        $chapa->largura = $request->input('largura');
        $chapa->altura = $request->input('altura');
        $chapa->area = ($request->input('largura') / 1000) * ($request->input('altura') / 1000);
        $chapa->preco = $request->input('preco');
        $chapa->fornecedor_id = $request->input('fornecedor');
        $chapa->espessura = $request->input('espessura');

        $chapa->save();

        return view('estoque.addItem', [
            'add' => 'chapas',
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