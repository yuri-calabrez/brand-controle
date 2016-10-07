<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of User
 *
 * @author Yuri
 */
class ClientRVA extends Model
{
    protected $table = "BRC_TAB_CLIENTE_R_VA";

    protected $fillable = ['MESES_AUSENTES', 'QTDE_CLIENTES', 'VA'];

}
