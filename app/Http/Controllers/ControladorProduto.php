<?php

namespace App\Http\Controllers;

use App\Grupo;
use App\CategoriaProduto;
use Illuminate\Http\Request;

class ControladorProduto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('produtos.produto');
    }

    public function categoriaIndex()
    {
        return view('produtos.cadCategoria', [
            'grupos' => Grupo::all()
        ]);
    }

    public function novoProd() {
        return view('produtos.cadProd');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produtos.cadGrupo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grupo = new Grupo();
        $grupo->nome = $request->input('nome');
        $grupo->descricao = $request->input('desc');

        $grupo->save();

        return view('produtos.cadGrupo', [
            'resul' => 'Cadastro Efetuado'
        ]);

    }

    public function categoriaForm(Request $request) {
        $categoria = new CategoriaProduto();
        $categoria->nome = $request->input('nome');
        $categoria->descricao = $request->input('desc');
        $categoria->grupo_id = $request->input('grupo');

        $categoria->save();

        return view('produtos.cadCategoria', [
            'resul' => 'Cadastro Efetuado',
            'grupos' => Grupo::all()
        ]);
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
