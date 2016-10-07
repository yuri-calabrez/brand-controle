<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of User
 *
 * @author Yuri
 */
class SaleConcept extends Model
{
    protected $table = "BRC_TAB_VENDA_CONCEITO_12M";

    protected $fillable = ['CONCEITO', 'VA', 'QTDE_CLIENTES'];
    
}
