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

    if(auth()->check()){
        return redirect('/home');
    }else{
        return redirect('login');
    }
});

\Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/ros', function(){
    $API = new RouterosAPI();
    $API->debug = true;
    if ($API->connect('aliyun.rosm.cn', 'xh', 'xianghao')) {


        $API->comm("/ppp/secret/add", array(
            "name"     => "ros_mmmm",
            "password" => "ros_mmmm",
            "comment"  => "new vpn user",
            "service"  => "pptp",
        ));
        $API->disconnect();

    }
});
