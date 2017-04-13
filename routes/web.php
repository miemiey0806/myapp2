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
$api=app('Dingo\Api\Routing\Router');

Route::get('/', function ()
{
    return view('welcome');
});

/**$api->version('v1', function($api)
{
    $api->get('hello', function()
 *
    {
        return "hello";
    });
});*/

$api->version('v1', function($api)
{
    $api->get('hello','App\Http\Controllers\HomeController@index'); //show all users data
    $api->get('users/{user_id}/roles/{role_name}','App\Http\Controllers\HomeController@attachUserRole');
    $api->get('users/{user_id}/roles','App\Http\Controllers\HomeController@getUserRole');
    $api->post('role/permission/add','App\Http\Controllers\HomeController@attachPermission');
    $api->get('role/permissions','App\Http\Controllers\HomeController@getPermission');

    //jwt authentication. to get token
    $api->post('authenticate', 'App\Http\Controllers\Auth\AuthController@authenticate');

});

/**Route::get('/secret', function()
{
    Auth::loginUsingId(1);

    $user = Auth::user();

    if ($user->hasRole('Author'))
    {
        return 'Redheads party the hardest!';
    }

    return 'Many people like to party.';
});*/

//middleware for authentication
$api->version('v1',['middleware'=>'api.auth'], function($api)
{
    $api->get('user_auth','App\Http\Controllers\Auth\AuthController@index' ); //show all users data

    $api->get('user','App\Http\Controllers\Auth\AuthController@show');
});






