<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use SoftDeletes;
    
    protected $table = 'fornecedores';
    protected $fillable = ['nome', 'site', 'uf', 'email'];
    public function produtos()
    {
        # Se fosse usado nomes diferentes
        return $this->hasMany('App\Item','fornecedor_id','id'); 

        # Para nome padrao
        //return $this->hasMany('App\Item');
    }

}