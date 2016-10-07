<?php

namespace App\Validation\Form;

use Respect\Validation\Validator as V;

/**
 * Description of UserForm
 *
 * @author Yuri
 */
class UserForm
{

    public static function rules()
    {
        return [
            'name' => V::alpha(' '),
            'email' => V::email(),
            'password' => V::optional(V::noWhitespace())
        ];
    }

}
