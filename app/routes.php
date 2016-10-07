<?php
//FRONT
$app->get('/', 'App\Controllers\HomeController::index')->setName('index');
$app->get('/quem-somos', 'App\Controllers\HomeController::sobreNos')->setName('sobre');

$app->post('/contato', 'App\Controllers\HomeController::contato')->setName('contato');
$app->post('/newsletter', 'App\Controllers\HomeController::newsLetterSubscribe')->setName('newsletter.subscribe');

//LOGIN
$app->get('/login', 'App\Controllers\LoginController::index')->setName('login.index');
$app->post('/login', 'App\Controllers\LoginController::login')->setName('login.signIn');
$app->get('/logout', 'App\Controllers\LoginController::logout')->setName('login.singOut');

//PAINEL
$app->group('/dashboard', function() use ($app) {
    $app->get('/cockpit', 'App\Controllers\DashboardController::cockpit')->setName('dashboard.cockpit');
    $app->get('/crm', 'App\Controllers\CrmController::index')->setName('dashboard.crm');
    $app->get('/crm/campanha', 'App\Controllers\CrmController::create')->setName('campanha.create');
    $app->post('/crm/campanha', 'App\Controllers\CrmController::store')->setName('campanha.store');
    $app->get('/crm/campanha/edit/{id}', 'App\Controllers\CrmController::edit')->setName('campanha.edit');
    $app->post('/crm/campanha/update/{id}', 'App\Controllers\CrmController::update')->setName('campanha.update');
    $app->get('/crm/campanha/delete/{id}', 'App\Controllers\CrmController::delete')->setName('campanha.delete');

    //CHARTS
    $app->get('/charts/bar', 'App\Controllers\DashboardController::barChart')->setName('charts.bar');
    $app->get('/charts/doughnut', 'App\Controllers\DashboardController::doughnutChart')->setName('charts.doughnut');
    
})->add(new \App\Middleware\AuthMiddleware($container->get(\Slim\Views\Twig::class), $container->get(Slim\Flash\Messages::class), $container->get(App\Auth\Auth::class), $container->get('router')));

//API
$app->group('/api', function() use ($app) {
    $app->get('/campanhas/{conceito}', 'App\Controllers\ApiController::campanhas');
    $app->get('/historico', 'App\Controllers\ApiController::historico');
    $app->put('/historico', 'App\Controllers\ApiController::updateAvaliacao');
});