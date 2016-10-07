<?php

namespace App\Handlers;

use Slim\Handlers\NotFound;
use Slim\Views\Twig;
use Psr\Http\Message\ServerRequestInterface as Request;

/**
 * Description of NotFoundHandler
 *
 * @author Yuri <yuri.calabrez@gmail.com>
 */
class NotFoundHandler extends NotFound
{
    protected $view;


    public function __construct(Twig $view)
    {
        $this->view = $view;
    }
    
    public function renderHtmlNotFoundOutput(Request $request)
    {
        return $this->view->fetch('404.twig');
    }
    
}
