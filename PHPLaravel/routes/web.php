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
    $collection = collect(['张三', '李四', '王五', null]);
    dd($collection->all());

    $collection = ['张三', '李四', '王五'];
    return  [$collection];
});
// any可以任何一种  match指定的一种
