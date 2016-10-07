<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of SaleHistory
 *
 * @author Yuri <yuri.calabrez@gmail.com>
 */
class SaleHistory extends Model
{
    protected $table = "BRC_APP_HISTORICO_COMPRAS";
    protected $fillable = ["VALOR", "DT_COMPRA", "QTDE", "PRODUTO", "MARCA", "RATING", "COMENTARIO"];
    public $timestamps = false;
}
