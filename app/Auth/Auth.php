<?php

namespace App\Auth;

use App\Helpers\Password;
use App\Repositories\Interfaces\UserRepositoryInterface;

/**
 * Description of Auth
 *
 * @author Yuri
 */
class Auth
{

    private $email;
    private $password;
    private $result;
    private $error;


    protected $repository;
    
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function login($email, $password)
    {
        $this->email = strip_tags(trim($email));
        $this->password = strip_tags(trim($password));
        $this->setLogin();
    }

    public function user()
    {
        return $this->repository->getBrandData($_SESSION['userlogin'])[0];
    }

    public function checkLogin()
    {
        return isset($_SESSION['userlogin']);
    }

    public function logOut()
    {
        unset($_SESSION['userlogin']);
    }
    
    function getError()
    {
        return $this->error;
    }

    
    public function getResult()
    {
        return $this->result;
    }

    private function setLogin()
    {
        $user = $this->repository->findByField('EMAIL', $this->email);

        if (!$user):
            $this->error = ["warning", "Os dados informados não são compativeis. Verifique!"];
            $this->result = false;
        elseif (!Password::check($this->password, $user->SENHA)):
            $this->error = ["warning", "E-mail e/ou seha invalidos."];
            $this->result = false;
        else:
            session_regenerate_id(true);
            $_SESSION['userlogin'] = $user->ID;
            
            //$_SESSION['connection'] = "";
            //$_SESSION["template"] = "";
            
            $this->result = true;
        endif;
    }

}
