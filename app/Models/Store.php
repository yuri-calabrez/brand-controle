<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of User
 *
 * @author Yuri
 */
class Store extends Model
{
    protected $table = "BRC_TAB_LOJAS";

    protected $fillable = ['CODIGO_FILIAL', 'FILIAL'];
    
    public function sales()
    {
        return $this->hasMany('App\Models\Sale', 'FILIAL');
    }
    
}
