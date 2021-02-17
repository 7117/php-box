<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('index', function () {
//    return 'Hello, Laravel!';
//});

//Route::any('index', function () {
//    return 'Hello, Laravel!';
//});

//Route::match(['get', 'post'], 'index', function () {
//    return 'Hello, Laravel!';
//});

//Route::get('index/{id}', function ($id) {
//    return 'Hello, Laravel!'.$id;
//});
//
//Route::get('task', 'TaskController@index');
//Route::get('task/read/{id}', 'TaskController@read');


//Route::get('task/read/{id}', 'TaskController@read')
//        ->where('id', '[0-9]+');

//Route::get('task/read/{id}', 'TaskController@read')
//    ->where(['id'=>'[0-9]+']);

//Route::get('task/read/{id}', 'TaskController@read')
//    ->where('id', '.*');

//Route::redirect('index', 'task', 301);
//Route::permanentRedirect('index', 'task');

//Route::view('task', 'task', ['id'=>10]);
//Route::get('task', function () {
//    return view('task', ['id'=>10]);
//});


//Route::get('task/url', 'TaskController@url');
//Route::get('task', 'TaskController@index')->name('task.index');


//Route::prefix('api')->get('index', function () {
//    return 'index';
//});
//Route::prefix('api')->get('task', 'TaskController@index');

//Route::group(['prefix'=>'api'], function () {
//    Route::get('index', function () {
//        return 'index';
//    });
//    Route::get('task', 'TaskController@index');
//});

//Route::prefix('api')->group(function () {
//    Route::get('index', function () {
//        return 'index';
//    });
//    Route::get('task', 'TaskController@index');
//});

//Route::middleware('中间件')->group(function () {
//    Route::get('index', function () {
//        return 'index';
//    });
//    Route::get('task', 'TaskController@index');
//});

//Route::domain('127.0.0.1')->group(function () {
//    Route::get('index', function () {
//        return 'index';
//    });
//    Route::get('task', 'TaskController@index');
//});

//Route::namespace('Admin')->group(function () {
//    Route::get('index', function () {
//        return 'index';
//    });
//    Route::get('task', 'TaskController@index');
//    Route::get('manage', 'ManageController@index');
//});

//Route::name('task.')->group(function () {
//    Route::get('index', function () {
//        return 'index';
//    });
//    Route::name('abc.')->group(function () {
//        Route::get('task', 'TaskController@index')->name('index');
//    });
//
//    Route::get('task/url', 'TaskController@url');
//});


//Route::get('one', 'OneController');

//Route::fallback(function () {
//    //return redirect('/');
//    //return view('404');
//});


//Route::get('task', 'TaskController@index')->name('task.index');

//Route::get('index', function () {
//    //dump(Route::current()->action);
//    //return Route::currentRouteName();
//    //return Route::currentRouteAction();
//})->name('location.index');

//use Illuminate\Support\Facades\Redirect;

//Route::get('index', function () {
//    //return redirect('/');
//    //return redirect()->to('task');
//    //return \Illuminate\Support\Facades\Redirect::to('task');
//    //return Redirect::to('task');
//    //return redirect()->route('task.index');
//    //return redirect()->back();
//    //return redirect()->action('TaskController@index');
//    return redirect()->away('http://www.baidu.com');
//});


//单个资源路由
//Route::resource('blogs', 'BlogController')
//        ->except(['index', 'show']);
//Route::resource('blogs', 'BlogController');

//批量资源路由
//Route::resources([
//    'blogs' =>  'BlogController'
//]);

//API资源路由
//Route::apiResource('blogs', 'BlogController');

//资源路由嵌套
//Route::resource('blogs.comments', 'CommentController')
//    ->shallow()->name('index', 'b.c.i')->parameters([
//        'blogs'     =>  'id',
//        'comments'  =>  'cid'
//    ]);


//Route::get('task/form', 'TaskController@form');
//
//Route::any('task/getform', function () {
//    return \Illuminate\Support\Facades\Request::method();
//});
//
//Route::any('api/getform', function () {
//    return \Illuminate\Support\Facades\Request::method();
//});

//Route::get('data', 'DataController@index');
//
//Route::get('/user/{id}/{uid}', 'UserController@index');
//Route::get('/view', 'UserController@view');
//Route::get('/url/{id}', 'UserController@url')->name('url.id');

//Route::get('/cookies', 'UserController@cookies');
//Route::get('/sess', 'UserController@sess');


//Route::get('/admin', 'LoginController@index')->middleware('check:abc');
//Route::get('/admin', 'LoginController@index')->middleware(\App\Http\Middleware\Check::class);
//Route::get('/admin', 'LoginController@index')->middleware('mymd');
//Route::get('/admin', 'LoginController@index');
//Route::get('/abc', 'LoginController@abc');


//Route::get('/task/user', 'TaskController@user');

//Route::get('/task/user', function () {
//    return view('user', [
//        'name'  =>  'Mr.Lee'
//    ]);
//});

//Route::get('/task/index', 'TaskController@index');
Route::get('/task/form', 'TaskController@form');
//Route::post('/task/receive', 'TaskController@receive');

Route::get('/task/page', 'TaskController@page');
Route::get('/users/list', 'TaskController@page');







