<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of User
 *
 * @author Yuri
 */
class Sale extends Model
{
    protected $table = "BRC_TAB_VENDAS";

    protected $fillable = ['DATA_VENDA', 'FILIAL', 'TICKET', 'PRODUTO', 'COR_PRODUTO', 'GRADE', 'QTDE', 'VALOR_PAGO'];
    
    public function client()
    {
        return $this->belongsTo('App\Models\Client', 'CODIGO_CLIENTE');
    }
    
    public function store()
    {
        return $this->belongsTo('App\Models\Store', 'FILIAL');
    }
    
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'PRODUTO');
    }
    
}
