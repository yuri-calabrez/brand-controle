<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of User
 *
 * @author Yuri
 */
class Campaign extends Model
{

    protected $table = "BRC_CAMPANHA";
    protected $fillable = ['FILIAL', 'CONCEITO', 'VALOR', 'PERCENTUAL', 'DT_INICIO', 'DT_LIMITE', 'MARCA'];

}
