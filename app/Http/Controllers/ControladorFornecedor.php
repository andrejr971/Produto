<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;

class ControladorFornecedor extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fornecedor.fornecedor', [
            'fornecedores' => Fornecedor::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fornecedor.cadFornecedor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fornecedor = new Fornecedor();

        $fornecedor->fornecedor = $request->input('nome');
        $fornecedor->cnpj = $request->input('cnpj');
        $fornecedor->telefone = $request->input('telefone');
        $fornecedor->email = $request->input('email');
        $fornecedor->inscricao = $request->input('inscEst');
        $fornecedor->cep = $request->input('cep');
        $fornecedor->cidade = $request->input('cidade');
        $fornecedor->endereco = $request->input('endereco');
        $fornecedor->bairro = $request->input('cidade');
        $fornecedor->uf = $request->input('uf');
        $fornecedor->numero = $request->input('numero');

        $fornecedor->save();

        return view('fornecedor.cadFornecedor', [
            'resul' => 'Cadastro Efetuado'
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
