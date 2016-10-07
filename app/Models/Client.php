<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of User
 *
 * @author Yuri
 */
class Client extends Model
{

    protected $table = "BRC_TAB_CLIENTES";
    protected $fillable = ['CLIENTE_VAREJO', 'CONCEITO', 'FILIAL', 'PRIMEIRA_VENDA', 'ULTIMA_VENDA'];

    public function clientRfv()
    {
        return $this->hasOne('App\Models\ClientRFV', 'CODIGO_CLIENTE');
    }
    
    public function sales()
    {
        return $this->hasMany('App\Models\Sale', 'CODIGO_CLIENTE');
    }

}
