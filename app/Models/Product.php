<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of User
 *
 * @author Yuri
 */
class Product extends Model
{
    protected $table = "BRC_TAB_PRODUTOS";

    protected $fillable = ['DESC_PRODUTO', 'GRUPO_PRODUTO', 'COLECAO'];
    
    public function sales()
    {
        return $this->hasMany('App\Models\Sale', 'PRODUTO');
    }
    
}
