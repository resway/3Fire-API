<?php
use think\Route;

Route::post('api/user/login', 'api/v1.User/login');
Route::post('api/user/info', 'api/v1.User/info');
Route::post('api/user/logout', 'api/v1.User/logout');


