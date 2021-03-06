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

    $router->resource('outbox', OutboxController::class, ['except' => ['create','store','edit','destroy','update']]);

    $router->get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');


    $router->get('delcache', 'CacheController@index');
    $router->post('delcache/delonebook', 'CacheController@delonebook');


    $router->resource('article', ArticleController::class , ['except' => ['destroy']] );
    $router->get('article/editinfo/{id}', 'ArticleController@editinfo')
              ->where('id', '^[1-9]\d*')
              ->name('article.editinfo');

    $router->resource('honor', HonorController::class);
    //$router->delete('delhonorcache', 'HonorController@delhonorcache');

});
