<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'UserController@authenticate');

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('user', 'UserController@getAuthenticatedUser');
    Route::get('balance/{id}', 'WalletController@getBalance');
    Route::get('wallet/{id}', 'WalletController@getWallet');
    Route::patch('wallet/{id}', 'WalletController@updateWallet');
    Route::get('usersWallet/{id}', 'WalletController@getUsersWallet');
    Route::get('logout', 'UserController@logout');
});
