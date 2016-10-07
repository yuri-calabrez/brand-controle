<?php

use function DI\get;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use Slim\Csrf\Guard;
use Slim\Flash\Messages;
use Interop\Container\ContainerInterface;
use App\Handlers\NotFoundHandler;
use App\Contracts\ValidationInterface;
use App\Validation\Validator;
use App\Helpers\Seo;
use App\Auth\Auth;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\NewsLetterRepository;
use App\Repositories\ClientRVARepository;
use App\Repositories\SaleConceptRepository;
use App\Repositories\TopStoreRepository;
use App\Repositories\StoreRepository;
use App\Repositories\CampaignRepository;
use App\Repositories\SaleHistoryRepository;
use App\Services\UserService;
use App\Services\NewsLetterService;

return [
    'router' => get(\Slim\Router::class),
    
    Guard::class => function(ContainerInterface $c){
        return new Guard;
    },
            
    Messages::class => function(ContainerInterface $c){
        return new Messages;
    },
            
    Seo::class => function (ContainerInterface $c){
        return new Seo($_SERVER['REQUEST_URI']);
    },        
    
    ValidationInterface::class => function(ContainerInterface $c){
      return new Validator;
    },
    
    Twig::class => function (ContainerInterface $c){
        $twig = new Twig(dirname(__DIR__)."/resources/views", [
            'cache' => false
        ]);
        
        $twig->addExtension(new TwigExtension(
            $c->get('router'),
            $c->get('request')->getUri()
        ));
        
        $twig->getEnvironment()->addGlobal('flash', $c->get(Messages::class));
        
        $twig->getEnvironment()->addGlobal('seo', $c->get(Seo::class));

        return $twig;
    },
            
   'notFoundHandler' => function(ContainerInterface $c) {
      return new NotFoundHandler($c->get(Twig::class));  
   },
           
    UserRepositoryInterface::class => function(ContainerInterface $c){
        return new UserRepository(new App\Models\User);
    },
    
    UserService::class => function(ContainerInterface $c){
        return new UserService($c->get(UserRepositoryInterface::class), $c->get(ValidationInterface::class));
    },
                  
    Auth::class => function(ContainerInterface $c){
        return new Auth($c->get(UserRepositoryInterface::class));
    },
            
    NewsLetterRepository::class => function(ContainerInterface $c) {
        return new NewsLetterRepository(new App\Models\NewsLetter);
    },
    
    NewsLetterService::class => function (ContainerInterface $c) {
        return new NewsLetterService($c->get(NewsLetterRepository::class));
    },
            
    ClientRVARepository::class => function (ContainerInterface $c){
        return new ClientRVARepository(new App\Models\ClientRVA);
    },
            
    SaleConceptRepository::class => function (ContainerInterface $c){
        return new SaleConceptRepository(new App\Models\SaleConcept);
    },
            
    TopStoreRepository::class => function(ContainerInterface $c){
        return new TopStoreRepository(new App\Models\TopStore);
    },
            
    StoreRepository::class => function (ContainerInterface $c){
        return new StoreRepository(new \App\Models\Store);
    },
    
    CampaignRepository::class => function (ContainerInterface $c){
        return new CampaignRepository(new \App\Models\Campaign);
    },
            
    SaleHistoryRepository::class => function (ContainerInterface $c){
        return new SaleHistoryRepository(new App\Models\SaleHistory);
    }
];