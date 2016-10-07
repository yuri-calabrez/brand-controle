<?php

namespace App\Middleware;

use Slim\Csrf\Guard;

/**
 * Description of CsrfResponseReaderMiddleware
 * <b>CsrfResponseReaderMiddleware</b> Middleware utilizado para requisições ajax 
 *
 * @author Yuri
 */
class CsrfResponseHeaderMiddleware
{

    private $guard;

    public function __construct(Guard $guard)
    {
        $this->guard = $guard;
    }

    public function __invoke($request, $response, $next)
    {
        $request = $this->guard->generateNewToken($request);

        $nameKey = $this->guard->getTokenNameKey();
        $valueKey = $this->guard->getTokenValueKey();
        $name = $request->getAttribute($nameKey);
        $value = $request->getAttribute($valueKey);

        $tokenArray = [
            $nameKey => $name,
            $valueKey => $value
        ];

        $response = $response->withAddedHeader('X-CSRF-Token', json_encode($tokenArray));

        return $next($request, $response);
    }

}
