<?php

namespace App\Middleware;

use Slim\Views\Twig;

/**
 * Description of ValidationErrorsMiddleware
 *
 * @author Yuri
 */
class ValidationErrorsMiddleware
{

    protected $view;

    public function __construct(Twig $view)
    {
        $this->view = $view;
    }

    public function __invoke($request, $response, $next)
    {

        if (isset($_SESSION['errors'])):
            $this->view->getEnvironment()->addGlobal('errors', $_SESSION['errors']);
            unset($_SESSION['errors']);
        endif;

        $response = $next($request, $response);

        return $response;
    }

}
