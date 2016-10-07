<?php

namespace App\Helpers;

/**
 * Seo [ MODEL ]
 * Classe de apoio para o modelo LINK. Pode ser utilizada para gerar SSEO para as páginas do sistema!
 * 
 * @copyright (c) 2014, Robson V. Leite UPINSIDE TECNOLOGIA
 */
class Seo
{

    private $Pach;
    private $File;
    private $Link;
    private $Schema;
    private $Title;
    private $Description;
    private $Image;

    public function __construct($Pach)
    {
        $this->Pach = explode('/', strip_tags(trim($Pach)));
        $this->File = (!empty($this->Pach[1]) ? $this->Pach[1] : "index");
        $this->Link = (!empty($this->Pach[2]) ? $this->Pach[2] : null);

        $this->setPach();
        //var_dump($this->Pach);
    }

    public function getPach()
    {
        return $this->Pach;
    }

    public function getSchema()
    {
        return $this->Schema;
    }

    public function getTitle()
    {
        return $this->Title;
    }

    public function getDescription()
    {
        return $this->Description;
    }

    public function getImage()
    {
        return $this->Image;
    }

    /*
     * ***************************************
     * **********  PRIVATE METHODS  **********
     * ***************************************
     */

    private function setPach()
    {

        switch ($this->File):
            case 'index':
                $this->Schema = "WebSite";
                $this->Title = "App Brand Controle";
                $this->Description = "As marcas que você compra estão aqui. Você tem acesso direto ao histórico de compras, promoções, campanhas, e dicas de produtos para que cada vez mais você continue sendo bem tratado pelas marcas que gosta.";
                $this->Image = "public/images/brand-controle/img_default.png";
                break;

            case 'quem-somos':
                $this->Schema = "WebSite";
                $this->Title = "Portal Brand Controle";
                $this->Description = "Portal de Gestão de Negócios para sua marca. Potencialize vendas, gerencie sua carteira de clientes e seus produtos, controlando os processos pertinentes ao seu negócio. As informações mais importantes para que sua empresa tome as decisões mais acertivas para alavancar vendas e reduzir custos operacionais.";
                $this->Image = 'public/images/brand-controle/img_default.png';
                break;
        endswitch;
    }

    private function set404()
    {
        /* $this->Schema = 'WebSite';
          $this->Title = "Oppsss, nada encontrado! - " . SITE_NAME;
          $this->Description = SITE_DESC;
          $this->Image = INCLUDE_PATH . '/images/default.jpg'; */
    }

}
