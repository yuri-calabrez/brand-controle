<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of User
 *
 * @author Yuri
 */
class NewsLetter extends Model
{
    protected $table = "BRC_NEWSLETTER";

    protected $fillable = ['EMAIL'];

}
