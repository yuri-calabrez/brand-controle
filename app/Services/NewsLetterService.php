<?php

namespace App\Services;

use App\Repositories\NewsLetterRepository;
use App\Helpers\Check;

/**
 * Description of NewsLetterService
 *
 * @author Yuri <yuri.calabrez@gmail.com>
 */
class NewsLetterService
{
    protected $newsLetter;
    private $email;
    private $result;
    private $error;


    public function __construct(NewsLetterRepository $repository)
    {
        $this->newsLetter = $repository;
    }
    
    public function subscribe($email)
    {
        $this->email = (string) $email;
        if(!Check::Email($this->email)) {
            $this->error = ["warning", "Formato de e-mail invalido. Verifique!"];
            $this->result = false;
        } else {
             $validation = $this->newsLetter->findByField("EMAIL", $this->email);
            if ($validation) {
                $this->error = ["info", "Este e-mail ja se encontra em nossa lista."];
                $this->result = false;
            } else {
                $this->newsLetter->create(['EMAIL' => $email]);
                $this->error = ["success", "Inscrição feita com sucesso em nossa newsletter!"];
                $this->result = true;
            }
        }
        
    }
    
    public function unsubscribe($email)
    {
        $this->email = (string) $email;
    }
    
    public function getResult()
    {
        return $this->result;
    }

    public function getError()
    {
        return $this->error;
    }


}
