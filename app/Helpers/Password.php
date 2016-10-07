<?php

namespace App\Helpers;

/**
 * Password [HELPER]
 *
 * @copyright (c) 2016, Yuri Calabrez
 */
class Password
{

    public static function hash($password)
    {
        return password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);
    }

    public static function check($password, $hash)
    {
        return password_verify($password, $hash);
    }

    public static function randomPass($valor = 8, $maiusculas = true, $numeros = true, $simbolos = false)
    {
        $lmin = 'abcdefghijklmnopqrstuvwxyz';
        $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $num = '1234567890';
        $simb = '!@#$%*-';
        $retorno = '';
        $caracteres = '';

        $caracteres .= $lmin;
        if ($maiusculas):
            $caracteres .= $lmai;
        endif;
        if ($numeros):
            $caracteres .= $num;
        endif;
        if ($simbolos):
            $caracteres .= $simb;
        endif;

        $len = strlen($caracteres);
        for ($n = 1; $n <= $tamanho; $n++) {
            $rand = mt_rand(1, $len);
            $retorno .= $caracteres[$rand - 1];
        }
        return $retorno;
    }

}
