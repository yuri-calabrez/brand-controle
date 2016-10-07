<?php

namespace App\Repositories;

/**
 * Description of ClientRVARepository
 *
 * @author Yuri <yuri.calabrez@gmail.com>
 */
class ClientRVARepository extends BaseRepository
{
    public function barChart()
    {
        $model = parent::findAll();
        foreach ($model as $valor) {
            $arrLabels[] =  $valor->MESES_AUSENTE;
            $arrData[] = $valor->QTDE_CLIENTES;
            $arrVa[] = $valor->VA;
            $arrDatasets = [
                ['label' => 'Qtde clientes', 'backgroundColor' => '#26B99A', 'data' => $arrData],
                ['label' => "VA", "backgroundColor" => "#09f", 'data' => $arrVa]
            ];
        }
        
        $arrReturn = ['labels' => $arrLabels, 'datasets' => $arrDatasets];
        
        return $arrReturn;
    }

}
