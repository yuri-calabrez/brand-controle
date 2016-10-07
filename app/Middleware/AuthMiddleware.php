<?php

namespace App\Middleware;

use Slim\Views\Twig;
use Slim\Flash\Messages;
use App\Auth\Auth;
use Slim\Router;

/**
 * Description of AuthMiddleware
 *
 * @author Yuri
 */
class AuthMiddleware
{

    protected $view;
    protected $flash;
    protected $auth;
    protected $route;

    public function __construct(Twig $view, Messages $flash, Auth $auth, Router $route)
    {
        $this->view = $view;
        $this->flash = $flash;
        $this->auth = $auth;
        $this->route = $route;
    }

    public function __invoke($request, $response, $next)
    {

        if (!$this->auth->checkLogin()):
            $this->flash->addMessage('error', "Você não possui acesso a esta area!");
            return $response->withRedirect($this->route->pathFor('login.index'));
        endif;


        $this->view->getEnvironment()->addGlobal('user', $this->auth->user());

        return $next($request, $response);
    }

}
