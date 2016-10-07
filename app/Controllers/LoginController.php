<?php

namespace App\Controllers;

use Slim\Views\Twig;
use Slim\Router;
use Slim\Flash\Messages;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Auth\Auth;

/**
 * Description of LoginController
 *
 * @author Yuri
 */
class LoginController
{

    protected $view;
    protected $route;

    public function __construct(Twig $view, Router $route)
    {
        $this->view = $view;
        $this->route = $route;
    }

    public function index(Request $request, Response $response, Auth $auth)
    {
        if ($auth->checkLogin()):
            return $response->withRedirect($this->route->pathFor('dashboard.cockpit'));
        endif;

        return $this->view->render($response, 'login/index.twig');
    }

    public function login(Request $request, Response $response, Auth $auth, Messages $flash)
    {
        $auth->login($request->getParam('email'), $request->getParam('password'));
        if (!$auth->getResult()):
            $flash->addMessage($auth->getError()[0], $auth->getError()[1]);
            return $response->withRedirect($this->route->pathFor('login.index'));
        endif;

        return $response->withRedirect($this->route->pathFor('dashboard.cockpit'));
    }

    public function logOut(Request $request, Response $response, Auth $auth, Messages $flash)
    {
        $auth->logOut();

        $flash->addMessage('success', "Você finalizou sua sessão com sucesso!");
        return $response->withRedirect($this->route->pathFor('login.index'));
    }

}
