<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of User
 *
 * @author Yuri
 */
class TopStore extends Model
{

    protected $table = "BRC_TAB_QTDECLIENTES_LOJA_TOP4";
    protected $fillable = ['FILIAL', 'QTDE_CLIENTES'];

}
