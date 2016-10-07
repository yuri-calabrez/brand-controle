<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\Twig;
use Slim\Router;
use Slim\Flash\Messages;
use App\Helpers\Email;
use App\Services\NewsLetterService;

/**
 * Description of HomeController
 *
 * @author Yuri
 */
class HomeController
{

    protected $view;
    protected $route;

    public function __construct(Twig $view, Router $route)
    {
        $this->view = $view;
        $this->route = $route;
    }

    public function index(Request $request, Response $response)
    {
        return $this->view->render($response, 'home.twig');
    }
    
    public function sobreNos(Request $request, Response $response)
    {
        return $this->view->render($response, 'sobre.twig');
    }
    
    public function contato(Request $request, Response $response, Messages $flash)          
    {         
        $dados = $request->getParams();
        $email = new Email(MAIL_HOST, MAIL_USER, MAIL_PASS, MAIL_PORT);
        $dados['assunto'] = (isset($dados['assunto']) ? $dados['assunto'] : "Mensagem vinda da página do App");
        $email->EnviarMontando($dados['assunto'], $dados['mensagem'], $dados['nome'], $dados['email'], 'Brand Controle', 'social@brandcontrole.com.br');
        if($email->getResult()) {
            $flash->addMessage("success", "Ola {$dados['nome']}. Recebemos o seu e-mail e retornaremos o mais breve possivel. Atensiosamente Brand Controle");
            return $response->withHeader('Location', '/#contato');
        } else {
            return "Erro: ".$email->getError();
        }
        
    }
    
    public function newsLetterSubscribe(Request $request, Response $response, NewsLetterService $service)
    {
        $email = $request->getParsedBody()['email_news'];
        $service->subscribe($email);
        return $response->withJson(["error" => $service->getError()[0], "message" => $service->getError()[1]]);
    }

}
