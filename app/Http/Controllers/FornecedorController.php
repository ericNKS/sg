<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedorController extends Controller
{
    public function index()
    {
        return view('app.fornecedor.index');
    }
    
    public function listar(Request $request)
    {
        $fornecedores = Fornecedor::where('nome', 'like', '%'. $request->nome .'%')
                                    ->Where('site', 'like', '%'. $request->site .'%')
                                    ->Where('uf', 'like', '%'. $request->uf .'%')
                                    ->Where('email', 'like', '%'. $request->email .'%')
                                    ->paginate(3);

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all(), 'msg' => '']);
    }

    public function adicionar(Request $request)
    {
        $msg = '';
        // INCLUSÃO
        if($request->input('_token') != '' && $request->input('id') == '' )
        {
            // nome site uf email
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];
            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
                'required' => 'O campo :attribute deve ser preenchido',
                
                'uf.min' => 'O campo UF deve ter no mínimo 2 caracteres',
                'uf.max' => 'O campo UF deve ter no máximo 2 caracteres',

                'email.email' => 'O campo email não foi preenchido corretamente'

            ];

            $request->validate($regras, $feedback);

            Fornecedor::create($request->all());

            # Poderia fazer um redirect
            # ou
            # Mandar dados para a view
            $msg = 'Cadastro realizado com sucesso!';

        }
        // EDIÇÃO
        if($request->input('_token') != '' && $request->input('id') != '' )
        {
            $id = $request->input('id');
            $fornecedor = Fornecedor::find($id);
            $update = $fornecedor->update($request->all());

            if($update)
            {
                $msg = 'Atualização realizado com sucesso!';
                return redirect()->route('app.fornecedor.editar', ['id' => $id,'msg' => $msg]);
            }
            else
            {
                $msg = 'Erro ao tentar atualizar o registro!';
            }
        }
        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }
    public function editar($id, $msg = '')
    {
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', ['fornecedor'=> $fornecedor, 'msg' => $msg]);
    }

    public function remover(Request $request, $id)
    {
        $fornecedor = Fornecedor::find($id);
        $fornecedor->delete();
        if($fornecedor)
        {
            $msg = 'Fornecedor foi deletado';
            return redirect()->route('app.fornecedor');
        }
        else
        {
            $msg = 'Erro ao deletar o fornecedor';
        }
    }

}
