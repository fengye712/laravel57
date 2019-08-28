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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello/dd', function () {
    return view('welcome');
});
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
    Route::get('/login','EntryController@loginForm');
    Route::post('/login','EntryController@login');
    Route::get('/index','EntryController@index');
    Route::any('/loginout','EntryController@loginout');

    //个人中心
    Route::post('/changePass','MyController@changePass');
    Route::get('/changePass','MyController@changepassForm');

    //标签管理
    Route::get('/tagcreate','TagController@create');
    Route::post('/tagcreate','TagController@store');
    Route::get('/tagindex','TagController@index');

});

Route::get('/testRedis','RedisController@testRedis')->name('testRedis');
//Route::any('/t',function(){
//
//    function  foo():int{
//        return 1.11;
//    }
//    echo foo();
//
//});
//
//
Route::get('/in','RedisController@index')->name('testRedis');
//Route::controllers('test','RedisController');

//Route::controllers('/qd','RedisController');

Route::get('sso/getTicket', '\Cblink\Sso\Http\Controllers\SsoController@getTicket');
Route::get('sso/login', '\Cblink\Sso\Http\Controllers\SsoController@login');
Route::get('sso', function () {
    $client = new \GuzzleHttp\Client();
    $response = $client->get('http://app.lara.net/sso/getTicket?'.http_build_query([
            'app_id' => 'test',
            'secret' => 'test',
        ]));
    $result = json_decode((string)$response->getBody(), true);

    if ($ticket = $result['ticket'] ?? null) {
        return redirect('http://app.lara.net/sso/login?ticket='.$ticket);
    }
});