<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\Twig;
use App\Repositories\ClientRVARepository;
use App\Repositories\SaleConceptRepository;
use App\Repositories\TopStoreRepository;

/**
 * Description of DashboardController
 *
 * @author Yuri
 */
class DashboardController
{

    protected $view;

    public function __construct(Twig $view)
    {
        $this->view = $view;
    }

    public function cockpit(Request $request, Response $response, SaleConceptRepository $conceito)
    {
        $conteitos = $conceito->findAll();
        return $this->view->render($response, "shoulder/cockpit.twig", ['conceitos' => $conteitos]);
    }

    public function barChart(Request $request, Response $response, ClientRVARepository $repo)
    {
        return $response->withJson($repo->barChart());
    }
    
    public function doughnutChart(Request $request, Response $response, TopStoreRepository $topSotre)
    {
        return $response->withJson($topSotre->doughnutChart());
    }

}
