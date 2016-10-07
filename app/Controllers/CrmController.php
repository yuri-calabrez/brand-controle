<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\Twig;
use Slim\Flash\Messages;
use Slim\Router;
use App\Repositories\StoreRepository;
use App\Repositories\CampaignRepository;
use App\Helpers\Check;

/**
 * Description of ApiController
 *
 * @author Yuri <yuri.calabrez@gmail.com>
 */
class CrmController
{

    /**
     * @var Messages
     */
    private $flash;

    /**
     * @var Router
     */
    private $route;

    /**
     * @var CampaignRepository
     */
    protected $campaign;
    protected $view;

    public function __construct(Twig $view, Router $route, Messages $flash, CampaignRepository $campaign)
    {

        $this->view = $view;
        $this->campaign = $campaign;
        $this->route = $route;
        $this->flash = $flash;
    }

    public function index(Request $request, Response $response)
    {
        $campanhas = $this->campaign->orderBy('ID', 'DESC');
        return $this->view->render($response, 'shoulder/crm.twig', ['campanhas' => $campanhas]);
    }

    public function create(Request $request, Response $response, StoreRepository $store)
    {
        $filiais = $store->findAll();
        return $this->view->render($response, 'shoulder/campanha/create.twig', ['filiais' => $filiais]);
    }
    
    public function store(Request $request, Response $response)
    {
        $dados = $request->getParsedBody();
        $dados = array_map('trim', $dados);
        
        $dados['DT_INICIO'] = Check::Nascimento($dados['DT_INICIO']);
        $dados['DT_LIMITE'] = Check::Nascimento($dados['DT_LIMITE']);
        if($dados['DT_LIMITE'] < date('Y-m-d')):
            $this->flash->addMessage("info", "A data limite não pode ser menor que a data atual!");
            return $response->withRedirect($this->route->pathFor('campanha.create'));
        endif;
        
        if($dados['TIPO'] == 'valor') {
             $dados['VALOR'] = Check::Decimal($dados['VALOR']);
             $dados['PERCENTUAL'] = null;
        } else {
            $dados['VALOR'] = null;
        }
        unset($dados['TIPO']);
        $this->campaign->create($dados);
        $this->flash->addMessage("success", "Campanha criada com sucesso!");
        return $response->withRedirect($this->route->pathFor('dashboard.crm'));
    }
    
    public function edit(Request $request, Response $response, StoreRepository $store, $id)
    {   
        $campanha = $this->campaign->find($id);
        if(!$campanha):
            $this->flash->addMessage("error", "A campanha que você esta tentando editar não existe!");
            return $response->withRedirect($this->route->pathFor('dashboard.crm'));
        endif;
        
        $filiais = $store->findAll();
        return $this->view->render($response, 'shoulder/campanha/edit.twig', ['campanha' => $campanha, 'filiais' => $filiais]);
    }
    
    public function update(Request $request, Response $response, $id)
    {
        $campanha = $this->campaign->find($id);
        if(!$campanha):
            $this->flash->addMessage("error", "A campanha que você esta tentando editar não existe!");
            return $response->withRedirect($this->route->pathFor('dashboard.crm'));
        endif;
        
        $dados = $request->getParsedBody();
        $dados = array_map('trim', $dados);
        
        $dados['DT_INICIO'] = Check::Nascimento($dados['DT_INICIO']);
        $dados['DT_LIMITE'] = Check::Nascimento($dados['DT_LIMITE']);
        if($dados['DT_LIMITE'] < date('Y-m-d')):
            $this->flash->addMessage("info", "A data limite não pode ser menor que a data atual!");
            return $response->withRedirect($this->route->pathFor('campanha.create'));
        endif;
        
        if($dados['TIPO'] == 'valor') {
             $dados['VALOR'] = Check::Decimal($dados['VALOR']);
             $dados['PERCENTUAL'] = null;
        } else {
            $dados['VALOR'] = null;
        }
        unset($dados['TIPO']);
        $this->campaign->update($id, $dados, "ID");
        $this->flash->addMessage("success", "Campanha editada com sucesso!");
        return $response->withRedirect($this->route->pathFor('dashboard.crm'));
    }
    
    public function delete(Request $request, Response $response, $id)
    {
        $campanha = $this->campaign->find($id);
        if(!$campanha):
            $this->flash->addMessage("error", "A campanha que você esta tentando remover não existe!");
            return $response->withRedirect($this->route->pathFor('dashboard.crm'));
        endif;
        
        $this->campaign->delete($id, 'ID');
        $this->flash->addMessage("success", "Campanha removida com sucesso!");
        return $response->withRedirect($this->route->pathFor('dashboard.crm'));
    }

}
