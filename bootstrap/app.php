<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');

use App\App;
use Slim\Views\Twig;
//use Slim\Csrf\Guard;
use Respect\Validation\Validator as V;
//use Dotenv\Dotenv;


define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_DATABASE', 'brand_controle');

define('MAIL_HOST', '');
define('MAIL_USER', '');
define('MAIL_PASS', '');
define('MAIL_PORT', '');

define('INC_ROOT', dirname(__DIR__));

require INC_ROOT.'/vendor/autoload.php';

$app = new App;
//$dotEnv = new Dotenv(__DIR__.'/../');
//$dotEnv->load();

$container = $app->getContainer();

require INC_ROOT.'/app/routes.php';
require INC_ROOT.'/app/database.php';

/*
 * REGISTRO DE MIDDLEWARES
 */
$app->add(new \App\Middleware\ValidationErrorsMiddleware($container->get(Twig::class)));
$app->add(new \App\Middleware\OldInputMiddleware($container->get(Twig::class)));

//CSRF
//Nota: o middleware 'CsrfResponseHeaderMiddleware' sempre tem que estar antes da chamada do Guard
/*$app->add(new \App\Middleware\CsrfResponseHeaderMiddleware($container->get(Guard::class)));
$app->add($container->get(Guard::class));
$app->add(new \App\Middleware\CsrfViewMiddleware($container->get(Guard::class), $container->get(Twig::class)));*/

//Regras adicionais de validação de formulãrio
V::with('\\App\\Validation\\Rules');
