<?php

namespace App\Middleware;

use Slim\Views\Twig;
use Slim\Csrf\Guard;

/**
 * Description of CsrfViewMiddleware
 *
 * @author Yuri
 */
class CsrfViewMiddleware
{

    private $view;
    private $guard;

    public function __construct(Guard $guard, Twig $view)
    {
        $this->guard = $guard;
        $this->view = $view;
    }

    public function __invoke($request, $response, $next)
    {

        $this->guard->generateToken();
        $this->view->getEnvironment()->addGlobal('csrf', [
            'field' => '
                <input type="hidden" name="' . $this->guard->getTokenNameKey() . '" value="' . $this->guard->getTokenName() . '" class="csrf"/>
                <input type="hidden" name="' . $this->guard->getTokenValueKey() . '" value="' . $this->guard->getTokenValue() . '" class="csrf"/>
            ',
            'tokenName' => $this->guard->getTokenName(),
            'tokenValue' => $this->guard->getTokenValue()
        ]);


        $response = $next($request, $response);

        return $response;
    }

}
