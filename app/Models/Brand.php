<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of Brand
 *
 * @author Yuri <yuri.calabrez@gmail.com>
 */
class Brand extends Model
{
    protected $table = "BRC_MARCAS";
    
    protected $fillable = ['NOME'];
    
    
    public function usuario()
    {
        return $this->hasOne(User::class, 'ID_MARCA');
    }
}
