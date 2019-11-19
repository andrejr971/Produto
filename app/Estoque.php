<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    public function estoqueGeral() {
        return  $this->hasMany('App\EstoqueGeral', 'cod_item', 'cod_item');
    }
}
