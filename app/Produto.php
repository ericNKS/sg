<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    public function produtoDetalhe()
    {
        // Produto tem 1 ProdutoDetalhe
        return $this->hasOne('App\ProdutoDetalhe');
    }
}
