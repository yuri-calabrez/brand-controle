<?php

namespace App\Repositories;

/**
 * Description of TopStoreRepository
 *
 * @author Yuri <yuri.calabrez@gmail.com>
 */
class TopStoreRepository extends BaseRepository
{
    public function doughnutChart()
    {
        $model = parent::findAll();
        foreach ($model as $result) {
            $arrLabels[] = trim($result->FILIAL);
            $arrQtdeClientes[] = $result->QTDE_CLIENTES;
            $arrDatasets = [
                ['data' => $arrQtdeClientes, 'backgroundColor' => ['#455C73', '#9B59B6', '#BDC3C7', '#09f'], 'hoverBackgroundColor' => ['#34495E', '#B370CF', '#CFD4D8', '#28A9FF']]
            ];
        }
        
        $arrReturn = ['labels' => $arrLabels, 'datasets' => $arrDatasets];
        
        return $arrReturn;
    }
}
