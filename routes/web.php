<?php
if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}
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


Auth::routes();


Route::group(/**
 *
 */
    ['middleware' => 'auth'], function () {


    /**
     * Logout Route
     */
    Route::get('/logout', 'Auth\LoginController@logout');

    /**
     * Dashboard Route
     */

    Route::get('/', 'DashboardController@index')->name('dashboard');


    /**
     * Transaction Routes
     */

    Route::prefix('transaction')->group(function () {
        Route::get('deposit', 'TransactionController@deposit')->name('deposit');
        Route::post('storeDeposit', 'TransactionController@storeDeposit')->name('storeDeposit');
        Route::get('transferBalance', 'TransactionController@transferBalance')->name('transferBalance');
        Route::post('postTransferBalance', 'TransactionController@postTransferBalance')->name('postTransferBalance');

    });


    /**
     * Account Routes
     */

    Route::prefix('account')->group(function () {

        Route::get('show/{account_id}', 'AccountController@show')->name('viewAccount');
        Route::get('allAccount', 'AccountController@allAccount')->name('allAccount');
        Route::post('store', 'AccountController@store')->name('storeAccount');
        Route::post('destroy/{account_id}', 'AccountController@destroy')->name('delete_account');

    });


});


