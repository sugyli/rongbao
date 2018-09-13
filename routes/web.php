<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/


Route::group([
    'namespace'     => 'Novel',
    'domain' => config('app.web_dashubao_url_2'),
    //'middleware'    => ['responseLast'],
], function () {
    Route::get('/', 'IndexController@webdashubaoindex')->name('web.dashubaoindex');
    //位置必须放在最上面
    Route::get('/book/{id}/{bid}/{cid}.html', 'ContentController@webdashubaocontent')
          ->where('id', '^[0-9]\d*')
          ->name('web.dashubaocontent');

    Route::get('/jieshaoinfo/{id}/{bid}.htm', 'InfoController@webdashubaolaoinfo')
          ->where('id', '^[0-9]\d*');

    Route::get('/book/{id}/{bid}/{any?}', 'InfoController@webdashubaoinfo')
          ->where('id', '^[0-9]\d*')
          ->name('web.dashubaoinfo');

    //分类
    Route::get('/fenlei/sort{sid}/{id}/{page}.htm', 'SortController@webdashubaosort')
          ->where('sid', '^[1-9]\d*')
          ->where('id', '^[0-9]\d*')
          ->name('web.dashubaosort');
    //top榜
    Route::get('/fenlei/{any}/{id}/{page}.htm', 'TopController@webdashubaotop')
          ->where('id', '^[0-9]\d*')
          ->name('web.dashubaotop');

});
Route::group([
    'namespace'     => 'Novel',
    'domain' => config('app.web_dashubao_url'),
    //'middleware'    => ['responseLast'],
], function () {
    Route::get('/', 'IndexController@webdashubaoindex')->name('web.dashubaoindex');
    //位置必须放在最上面
    Route::get('/book/{id}/{bid}/{cid}.html', 'ContentController@webdashubaocontent')
          ->where('id', '^[0-9]\d*')
          ->name('web.dashubaocontent');

    Route::get('/jieshaoinfo/{id}/{bid}.htm', 'InfoController@webdashubaolaoinfo')
          ->where('id', '^[0-9]\d*');

    Route::get('/book/{id}/{bid}/{any?}', 'InfoController@webdashubaoinfo')
          ->where('id', '^[0-9]\d*')
          ->name('web.dashubaoinfo');

    //分类
    Route::get('/fenlei/sort{sid}/{id}/{page}.htm', 'SortController@webdashubaosort')
          ->where('sid', '^[1-9]\d*')
          ->where('id', '^[0-9]\d*')
          ->name('web.dashubaosort');
    //top榜
    Route::get('/fenlei/{any}/{id}/{page}.htm', 'TopController@webdashubaotop')
          ->where('id', '^[0-9]\d*')
          ->name('web.dashubaotop');

});
Route::group([
    'namespace'     => 'Novel',
    'domain' => config('app.web_dashubao_url_2'),
    //'middleware'    => ['responseLast'],
], function () {
    Route::get('/', 'IndexController@webdashubaoindex')->name('web.dashubaoindex');
    //位置必须放在最上面
    Route::get('/book/{id}/{bid}/{cid}.html', 'ContentController@webdashubaocontent')
          ->where('id', '^[0-9]\d*')
          ->name('web.dashubaocontent');

    Route::get('/jieshaoinfo/{id}/{bid}.htm', 'InfoController@webdashubaolaoinfo')
          ->where('id', '^[0-9]\d*');

    Route::get('/book/{id}/{bid}/{any?}', 'InfoController@webdashubaoinfo')
          ->where('id', '^[0-9]\d*')
          ->name('web.dashubaoinfo');

    //分类
    Route::get('/fenlei/sort{sid}/{id}/{page}.htm', 'SortController@webdashubaosort')
          ->where('sid', '^[1-9]\d*')
          ->where('id', '^[0-9]\d*')
          ->name('web.dashubaosort');
    //top榜
    Route::get('/fenlei/{any}/{id}/{page}.htm', 'TopController@webdashubaotop')
          ->where('id', '^[0-9]\d*')
          ->name('web.dashubaotop');

});
//手机
Route::group([
    'namespace'     => 'Novel',
    'domain' => config('app.wap_dashubao_url'),
    //'middleware'    => ['responseLast'],
], function () {
    Route::get('/', 'IndexController@wapdashubaoindex')->name('wap.dashubaoindex');

    Route::get('/wapbook-{bid}/{any?}', 'InfoController@wapdashubaolaoinfo');
    Route::get('/wapbook-{bid}_{id}/{any?}', 'InfoController@wapdashubaolaoinfo')->where('id', '^[0-9]\d*');
    Route::get('/wapbook-{bid}_{id}_{zid}/{any?}', 'InfoController@wapdashubaolaoinfo')
              ->where('id', '^[0-9]\d*')
              ->where('zid', '^[0-9]\d*');

    Route::get('/info-{bid}/{any?}', 'InfoController@wapdashubaoinfo')->name('wap.dashubaoinfo');

    Route::get('/bookmulu-{bid}_{page}/{any?}', 'InfoController@wapdashubaomulu')
            ->name('wap.dashubaomulu');
    Route::get('/bookmulu-{bid}_{page}_{zid}/{any?}', 'InfoController@wapdashubaomulu')
          ->where('zid', '^[1-9]\d*')
          ->name('wap.dashubaomulu1');



    Route::get('/wapbook-{bid}-{cid}/{any?}', 'ContentController@wapdashubaocontent')->name('wap.dashubaocontent');

    Route::get('/wapsort/{sid}/{page}', 'SortController@wapdashubaosort')
          ->where('sid', '^[1-9]\d*')
          ->name('wap.dashubaosort');
    Route::get('/wapsort/{any?}', 'SortController@wapdashubaosortindex')->name('wap.dashubaosortindex');



    //Route::get('/waptop', 'TopController@waptop')->name('mnovels.waptop');
    Route::get('/waptop/{any?}/{spage?}', 'TopController@wapdashubaotop')->name('wap.dashubaotop');
    /*
    Route::get('/wapsort', function () {
      dd('ss');
    });
    */
});
Route::group([
    'namespace'     => 'Novel',
    'domain' => config('app.wap_dashubao_url_2'),
    //'middleware'    => ['responseLast'],
], function () {
    Route::get('/', 'IndexController@wapdashubaoindex')->name('wap.dashubaoindex');

    Route::get('/wapbook-{bid}/{any?}', 'InfoController@wapdashubaolaoinfo');
    Route::get('/wapbook-{bid}_{id}/{any?}', 'InfoController@wapdashubaolaoinfo')->where('id', '^[0-9]\d*');
    Route::get('/wapbook-{bid}_{id}_{zid}/{any?}', 'InfoController@wapdashubaolaoinfo')
              ->where('id', '^[0-9]\d*')
              ->where('zid', '^[0-9]\d*');

    Route::get('/info-{bid}/{any?}', 'InfoController@wapdashubaoinfo')->name('wap.dashubaoinfo');

    Route::get('/bookmulu-{bid}_{page}/{any?}', 'InfoController@wapdashubaomulu')
            ->name('wap.dashubaomulu');
    Route::get('/bookmulu-{bid}_{page}_{zid}/{any?}', 'InfoController@wapdashubaomulu')
          ->where('zid', '^[1-9]\d*')
          ->name('wap.dashubaomulu1');



    Route::get('/wapbook-{bid}-{cid}/{any?}', 'ContentController@wapdashubaocontent')->name('wap.dashubaocontent');

    Route::get('/wapsort/{sid}/{page}', 'SortController@wapdashubaosort')
          ->where('sid', '^[1-9]\d*')
          ->name('wap.dashubaosort');
    Route::get('/wapsort/{any?}', 'SortController@wapdashubaosortindex')->name('wap.dashubaosortindex');



    //Route::get('/waptop', 'TopController@waptop')->name('mnovels.waptop');
    Route::get('/waptop/{any?}/{spage?}', 'TopController@wapdashubaotop')->name('wap.dashubaotop');
    /*
    Route::get('/wapsort', function () {
      dd('ss');
    });
    */
});
//登录
Route::group([
    'namespace'     => 'Novel',
    'prefix'        => 'member',
    'domain' => config('app.web_dashubao_url'),
    'middleware'    => ['user'],
], function () {


    Route::get('/login', 'LoginController@webdashubaovlogin')->middleware('delusercook')->name('web.dashubaologin');
    Route::post('/login', 'LoginController@webdashubaologin');


    Route::get('/register', 'RegisterController@webdashubaovregister')->middleware('delusercook')->name('web.dashubaoregister');
    Route::post('/register', 'RegisterController@webdashubaoregister');

});
Route::group([
    'namespace'     => 'Novel',
    'prefix'        => 'member',
    'domain' => config('app.web_dashubao_url_2'),
    'middleware'    => ['user'],
], function () {


    Route::get('/login', 'LoginController@webdashubaovlogin')->middleware('delusercook')->name('web.dashubaologin');
    Route::post('/login', 'LoginController@webdashubaologin');


    Route::get('/register', 'RegisterController@webdashubaovregister')->middleware('delusercook')->name('web.dashubaoregister');
    Route::post('/register', 'RegisterController@webdashubaoregister');

});
//登录
Route::group([
    'namespace'     => 'Novel',
    'prefix'        => 'member',
    'domain' => config('app.wap_dashubao_url'),
    'middleware'    => ['user'],
], function () {

    Route::get('/login', 'LoginController@wapdashubaovlogin')->name('wap.dashubaologin');
    Route::post('/login', 'LoginController@wapdashubaologin');

    Route::get('/register', 'RegisterController@wapdashubaovregister')->name('wap.dashubaoregister');
    Route::post('/register', 'RegisterController@wapdashubaoregister');

});
Route::group([
    'namespace'     => 'Novel',
    'prefix'        => 'member',
    'domain' => config('app.wap_dashubao_url_2'),
    'middleware'    => ['user'],
], function () {

    Route::get('/login', 'LoginController@wapdashubaovlogin')->name('wap.dashubaologin');
    Route::post('/login', 'LoginController@wapdashubaologin');

    Route::get('/register', 'RegisterController@wapdashubaovregister')->name('wap.dashubaoregister');
    Route::post('/register', 'RegisterController@wapdashubaoregister');

});


//注册后 需要验证
Route::group([
    'namespace'     => 'Novel',
    'prefix'        => 'member',
    'middleware'    => ['user','auth','addusercook'],
    'domain' => config('app.web_dashubao_url')
], function () {
    Route::get('/userindex', 'UsersController@webdashubaouserindex')->name('web.dashubaouserindex');
    Route::get('/bookshelfindex', 'BookshelfsController@webdashubaobookshelfindex')->name('web.dashubaobookshelfindex');

    Route::get('/passedit', 'UsersController@webdashubaopassedit')->name('web.dashubaopassedit');
    Route::post('/passedit', 'UsersController@webdashubaopassupdate');

    Route::get('/outboxindex', 'MsgboxsController@webdashubaooutboxindex')->name('web.dashubaooutboxindex');
    Route::get('/outboxshow/{id}', 'MsgboxsController@webdashubaooutboxshow')
            ->where('id', '^[1-9]\d*')
            ->name('web.dashubaooutboxshow');
    Route::get('/inboxindex', 'MsgboxsController@webdashubaoinboxindex')->name('web.dashubaoinboxindex');
    Route::get('/inboxshow/{id}', 'MsgboxsController@webdashubaoinboxshow')
            ->where('id', '^[1-9]\d*')
            ->name('web.dashubaoinboxshow');

    Route::get('/sendadminmessage', 'MsgboxsController@webdashubaosendadminmessage')->name('web.dashubaosendadminmessage');
});
Route::group([
    'namespace'     => 'Novel',
    'prefix'        => 'member',
    'middleware'    => ['user','auth','addusercook'],
    'domain' => config('app.web_dashubao_url_2')
], function () {
    Route::get('/userindex', 'UsersController@webdashubaouserindex')->name('web.dashubaouserindex');
    Route::get('/bookshelfindex', 'BookshelfsController@webdashubaobookshelfindex')->name('web.dashubaobookshelfindex');

    Route::get('/passedit', 'UsersController@webdashubaopassedit')->name('web.dashubaopassedit');
    Route::post('/passedit', 'UsersController@webdashubaopassupdate');

    Route::get('/outboxindex', 'MsgboxsController@webdashubaooutboxindex')->name('web.dashubaooutboxindex');
    Route::get('/outboxshow/{id}', 'MsgboxsController@webdashubaooutboxshow')
            ->where('id', '^[1-9]\d*')
            ->name('web.dashubaooutboxshow');
    Route::get('/inboxindex', 'MsgboxsController@webdashubaoinboxindex')->name('web.dashubaoinboxindex');
    Route::get('/inboxshow/{id}', 'MsgboxsController@webdashubaoinboxshow')
            ->where('id', '^[1-9]\d*')
            ->name('web.dashubaoinboxshow');

    Route::get('/sendadminmessage', 'MsgboxsController@webdashubaosendadminmessage')->name('web.dashubaosendadminmessage');
});

Route::group([
    'namespace'     => 'Novel',
    'prefix'        => 'member',
    'middleware'    => ['user','auth'],
    'domain' => config('app.wap_dashubao_url')
], function () {
    Route::get('/userindex', 'UsersController@wapdashubaouserindex')->name('wap.dashubaouserindex');
    Route::get('/bookshelfindex', 'BookshelfsController@wapdashubaobookshelfindex')->name('wap.dashubaobookshelfindex');

    Route::get('/passedit', 'UsersController@wapdashubaopassedit')->name('wap.dashubaopassedit');
    Route::post('/passedit', 'UsersController@wapdashubaopassupdate');

    Route::get('/outboxindex', 'MsgboxsController@wapdashubaooutboxindex')->name('wap.dashubaooutboxindex');
    Route::get('/outboxshow/{id}', 'MsgboxsController@wapdashubaooutboxshow')
            ->where('id', '^[1-9]\d*')
            ->name('wap.dashubaooutboxshow');
    Route::get('/inboxindex', 'MsgboxsController@wapdashubaoinboxindex')->name('wap.dashubaoinboxindex');
    Route::get('/inboxshow/{id}', 'MsgboxsController@wapdashubaoinboxshow')
            ->where('id', '^[1-9]\d*')
            ->name('wap.dashubaoinboxshow');

    Route::get('/sendadminmessage', 'MsgboxsController@wapdashubaosendadminmessage')->name('wap.dashubaosendadminmessage');

});
Route::group([
    'namespace'     => 'Novel',
    'prefix'        => 'member',
    'middleware'    => ['user','auth'],
    'domain' => config('app.wap_dashubao_url_2')
], function () {
    Route::get('/userindex', 'UsersController@wapdashubaouserindex')->name('wap.dashubaouserindex');
    Route::get('/bookshelfindex', 'BookshelfsController@wapdashubaobookshelfindex')->name('wap.dashubaobookshelfindex');

    Route::get('/passedit', 'UsersController@wapdashubaopassedit')->name('wap.dashubaopassedit');
    Route::post('/passedit', 'UsersController@wapdashubaopassupdate');

    Route::get('/outboxindex', 'MsgboxsController@wapdashubaooutboxindex')->name('wap.dashubaooutboxindex');
    Route::get('/outboxshow/{id}', 'MsgboxsController@wapdashubaooutboxshow')
            ->where('id', '^[1-9]\d*')
            ->name('wap.dashubaooutboxshow');
    Route::get('/inboxindex', 'MsgboxsController@wapdashubaoinboxindex')->name('wap.dashubaoinboxindex');
    Route::get('/inboxshow/{id}', 'MsgboxsController@wapdashubaoinboxshow')
            ->where('id', '^[1-9]\d*')
            ->name('wap.dashubaoinboxshow');

    Route::get('/sendadminmessage', 'MsgboxsController@wapdashubaosendadminmessage')->name('wap.dashubaosendadminmessage');

});
//公用
Route::group([
    'namespace'     => 'Novel',
    'prefix'        => 'member',
], function () {
    Route::get('/search', 'SearchController@search')->name('search');
    Route::post('/search', 'SearchController@alisearch');


    Route::get('/checkupnextchapter/{bid}/{chapterorder}', 'ContentController@checkupnextchapter')
          ->where('chapterorder', '^[0-9]\d*')
          ->name('checkupnextchapter');

});
//需要验证登陆的 公用
Route::group([
    'namespace'     => 'Novel',
    'prefix'        => 'member',
    'middleware'    => ['user']
], function () {
    Route::post('/verifylogin', 'LoginController@verifylogin')->name('verifylogin');
    Route::get('/readbookshelf/{bid?}/{cid?}', 'BookshelfsController@readbookshelf')->name('readbookshelf');
    Route::post('/bookshelfdata', 'BookshelfsController@bookshelfdata')->name('bookshelfdata');
    Route::post('/bookshelf/destroy', 'BookshelfsController@destroy')->name('bookshelfdestroy');

    Route::post('/inbox/destroy', 'MsgboxsController@inboxdestroy')->name('inboxdestroy');
    Route::post('/outbox/destroy', 'MsgboxsController@outboxdestroy')->name('outboxdestroy');
    Route::post('/sendmessage', 'MsgboxsController@sendmessage')->name('sendmessage');


    Route::any('/logout', 'LoginController@destroy')->middleware('delusercook')->name('logout');


    Route::post('/addbookcase', 'BookshelfsController@addbookcase')->name('addbookcase');

    Route::post('/recommend', 'UsersController@recommend')->name('recommend');

    //Route::post('/checkupsql', 'IndexController@upsqldata')->name('upsqldata');

});

//采集
Route::group([
    'prefix'        => 'caiji',
    'domain' => config('app.caiji_url')
], function () {
    Route::get('/caijibaba', 'CaijiController@caijibaba');
    Route::get('/update', 'CaijiController@update');
    Route::get('/caiji93shu', 'CaijiController@caiji93shu');
    Route::get('/caijiinfo93shu', 'CaijiController@caijiinfo93shu');
});
