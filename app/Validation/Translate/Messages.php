<?php

namespace App\Validation\Translate;

/**
 * Description of Messages
 *
 * @author Yuri
 */
class Messages
{

    public static function getMessages()
    {
        return [
            'alnum' => '{{name}} deve conter apenas letras e números',
            'alpha' => '{{name}} deve possuir apenas letras',
            'length' => '{{name}} deve possuir mais que {{minValue}} caracteres',
            'noWhitespace' => '{{name}} não pode conter espaços',
        ];
    }

}
