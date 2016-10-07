<?php

namespace App\Validation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

/**
 * Description of EmailAvailableException
 *
 * @author Yuri
 */
class EmailAvailableException extends ValidationException
{

    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'Este e-mail ja esta em uso!'
        ]
    ];

}
