<?php

namespace App\Http\Controllers;

use App\ProdutoDetalhe;
use App\Unidade;
use App\ItemDetalhe;
use Illuminate\Http\Request;

class ProdutoDetalheController extends Controller
{
    public function index()
    {
        //
    }

    
    public function create()
    {
        $unidades = Unidade::all();
        return view('app.produto_detalhe.create', ['unidades' => $unidades]);
    }

    
    public function store(Request $request)
    {
        ProdutoDetalhe::create($request->all());
        echo 'Cadastro realizado com sucesso!';
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $produtoDetalhe = ItemDetalhe::find($id);
        $unidades = Unidade::all();
        return view('app.produto_detalhe.edit', [ 'unidades' => $unidades, 'produto_detalhe' => $produtoDetalhe ]);
    }

    public function update(Request $request, ProdutoDetalhe $produtoDetalhe)
    {
        $produtoDetalhe->update($request->all());
        echo 'Atualizacao realizada com sucesso';
    }

    public function destroy($id)
    {
        //
    }
}
