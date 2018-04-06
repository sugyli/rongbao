<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'domain' => config('app.admin_url')
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('inbox', InboxController::class, ['except' => ['create','edit','destroy','update']]);

});