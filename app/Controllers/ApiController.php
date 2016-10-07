<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Repositories\SaleHistoryRepository;
use App\Repositories\CampaignRepository;
use App\Helpers\Check;

/**
 * Description of ApiController
 *
 * @author Yuri <yuri.calabrez@gmail.com>
 */
class ApiController
{

    /**
     * @var SaleHistoryRepository
     */
    private $historico;

    public function __construct(SaleHistoryRepository $historico)
    {
        $this->historico = $historico;
    }
    
    public function campanhas(Request $request, Response $response, CampaignRepository $campanha, $conceito)
    {
        $campanhas = $campanha->findAllByField('CONCEITO', $conceito);
        $json = [];
        foreach ($campanhas as $c):
            $arrCampanha['marca'] = $c->MARCA;
            $arrCampanha['filial'] = $c->FILIAL;
            $arrCampanha['promocao'] = ($c->VALOR == null ? $c->PERCENTUAL."%" : number_format($c->VALOR, 2, ',', '.'));
            array_push($json, $arrCampanha);
        endforeach;
        
        return $response->withJson(['campanha' => $json]);
    }

    public function historico(Request $request, Response $response)
    {
        $historicos = $this->historico->orderBy("DT_COMPRA", "DESC");
        $json = [];
        foreach ($historicos as $historico):
            $arrHistorico['id'] = $historico->id;
            $arrHistorico['valor'] = $historico->valor;
            $arrHistorico['dt_compra'] = date('d/m/Y', strtotime($historico->dt_compra));
            $arrHistorico['qtde'] = $historico->qtde;
            $arrHistorico['produto'] = $historico->produto;
            $arrHistorico['marca'] = $historico->marca;
            $arrHistorico['rating'] = $historico->rating;
            $arrHistorico['comentario'] = $historico->comentario;  
            array_push($json, $arrHistorico);
        endforeach;
        
        return $response->withJson(["historico" => $json]);
    }
    
    public function updateAvaliacao(Request $request, Response $response)
    {
        $dados = $request->getParsedBody();
        $verifica = $this->historico->find($dados['id']);
        if(!$verifica):
            return $response->withJson(["message" => "Histórico não existe", "status" => false], 404);
        endif;
        $dados['dt_compra'] = Check::Nascimento($dados['dt_compra']);
        $this->historico->update($dados['id'], $dados);
        return $response->withJson(["message" => "Avaliação realizada com sucesso!"]);
        
    }

}
