<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of User
 *
 * @author Yuri
 */
class ClientRFV extends Model
{

    protected $table = "BRC_TAB_CLIENTE_RFV";
    protected $fillable = ['CONCEITO', 'VALOR_PAGO', 'QTDE', 'TICKETS', 'VA', 'PA', 'MESES_AUSENTE'];

    public function client()
    {
        $this->belongsTo('App\Models\Client', 'CODIGO_CLIENTE');
    }

}
