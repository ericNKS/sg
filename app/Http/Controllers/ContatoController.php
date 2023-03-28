<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {
        /*
        echo '<pre>';
        print_r($request->all());
        echo '</pre>';
        echo $request->input('email');
        */

        /*
        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');

        $contato->save(); // Salva no banco de dados

        */

        //OU

        //$contato = new SiteContato();
        //$contato->fill($request->all()); // metodo protected fillable tem que ter sido declarado no model
        //$contato->save();

        // OU
        //$contato->create($request->all()); // metodo protected fillable tem que ter sido declarado no model

        $motivo_contatos = MotivoContato::all();
        return view('site.contato', ['motivo_contatos'=> $motivo_contatos]);
    }

    public function salvar(Request $request){
        // Realizar a validação dos dados do formulario recebido no request

        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos',  //  Nomes com no minimo 3 caracteres e no maximo 40
            'email' => 'email',
            'telefone' => 'required',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $feedback = [
            'nome.required' => 'O campo nome precisa ser preenchido',
            'nome.min' => 'O campo nome precisa ter no minimo 3 caracteres',
            'nome.max' => 'O campo nome precisa ter no maximo 40 caracteres',
            'nome.unique' => 'O nome informado já está em uso',
    
            'required' => 'O campo :attribute deve ser preenchido',
            'email.email' => 'O email informado não é valido',
            'mensagem.max' => 'A mensagem deve ter no maximo 200 caracteres'
    
        ];

        $request->validate($regras, $feedback);
        
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
