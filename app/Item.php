<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'produtos'; // Referencia a tabela
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    public function itemDetalhe()
    {
        // Produto tem 1 ProdutoDetalhe
        return $this->hasOne('App\ItemDetalhe', 'produto_id', 'id');
    }
}
