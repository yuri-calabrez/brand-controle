<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of User
 *
 * @author Yuri
 */
class User extends Model
{
    protected $table = "BRC_USUARIOS";

    protected $fillable = ['ID_MARCA', 'EMAIL', 'SENHA'];
    
    public function marca()
    {
        return $this->belongsTo(Brand::class);
    }

}
