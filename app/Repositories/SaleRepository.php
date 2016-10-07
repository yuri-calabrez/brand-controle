<?php

namespace App\Repositories;

/**
 * Description of SaleRepository
 *
 * @author Yuri <yuri.calabrez@gmail.com>
 */
class SaleRepository extends BaseRepository
{
    public function getPurchaseHistory($client)
    {
        /*return $this->model->join('BRC_TAB_CLIENTES', 'BRC_TAB_VENDAS.CODIGO_CLIENTE', '=', 'BRC_TAB_CLIENTES.CODIGO_CLIENTE')
                            ->join('BRC_TAB_PRODUTOS', 'BRC_TAB_VENDAS.PRODUTO', '=', 'BRC_TAB_PRODUTOS.PRODUTO')
                            ->select('BRC_TAB_VENDAS.FILIAL', 'BRC_TAB_VENDAS.QTDE', 'BRC_TAB_VENDAS.VALOR_PAGO', 'BRC_TAB_CLIENTES.CLIENTE_VAREJO', 'BRC_TAB_PRODUTOS.DESC_PRODUTO')
                            ->where('BRC_TAB_VENDAS.CODIGO_CLIENTE', $client)
                            ->get();*/
        
        return "ma oe";
    }
}
