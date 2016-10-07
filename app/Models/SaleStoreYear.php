<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of User
 *
 * @author Yuri
 */
class SaleStoreYear extends Model
{
    protected $table = "BRC_TAB_VENDA_LOJA_ANO";

    protected $fillable = ['FILIAL', 'ANO', 'VALOR_PAGO', 'QTDE'];
    
}
