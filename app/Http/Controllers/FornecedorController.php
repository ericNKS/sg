<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedor = [
            [
                'nome' => 'Fornecedor 1',
                'status' => 'N',
                'cnpj' => '0',
                'ddd' => '71', // Salvador (BA)
                'telefone' => '0000-0000'
            ],
            [
                'nome' => 'Fornecedor 2',
                'status' => 'S',
                'cnpj' => null,
                'ddd' => '32', // Juiz de fora (MG)
                'telefone' => '0000-0000'
            ],
            [
                'nome' => 'Fornecedor 3',
                'status' => 'S',
                'cnpj' => '0',
                'ddd' => '85', // Fortaleza (CE)
                'telefone' => '0000-0000'
            ]
        ];

        return view('app.fornecedor.index', compact('fornecedor'));
    }
}
