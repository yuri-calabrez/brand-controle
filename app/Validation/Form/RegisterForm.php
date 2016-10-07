<?php

namespace App\Validation\Form;

use Respect\Validation\Validator as V;

/**
 * Description of RegisterForm
 *
 * @author Yuri
 */
class RegisterForm
{

    public static function rules()
    {
        return [
            'name' => V::alpha(' '),
            'email' => V::email()->emailAvailable(),
            'password' => V::alnum()->noWhitespace()
        ];
    }

}
