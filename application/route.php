<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// return [
//     '__pattern__' => [
//         'name' => '\w+',
//     ],
//     '[hello]'     => [
//         ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//         ':name' => ['index/hello', ['method' => 'post']],
//     ],

// ];
use think\Route;
Route::post("login","api/Login/checkLogin");
Route::post("message","api/User/getAllByID");
Route::get("all","api/LostAndFound/getAll");
Route::post("create","api/User/create");
Route::post("update/:id","api/User/update");
Route::post("delete/:id","api/User/deleteData");
Route::post("register","api/Register/checkRegister");
Route::post("token","api/Login/getToken");