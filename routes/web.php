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

Auth::routes();


Route::get('lang/{lang}', function($lang) {

    \Session::put('lang', $lang);

    return \Redirect::back();

})->middleware('web')->name('change_lang');

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],

function (){
    Route::get('/', '\App\Http\Controllers\Auth\LoginController@showLoginForm');
    Route::get('/dashboard', 'DashboardController@index');
    //------------User------------------------------
    Route::resource('users', UsersController::class);


    Route::resource('roles', 'RoleController');
    Route::get('/profile', 'ProfileController@index')->name('profile.index');
    Route::put('/profile', 'ProfileController@update')->name('profile.update');

    // Report
    Route::group([
        'prefix' => 'reports'
    ], function () {
        Route::get('/', 'ReportController@index')->name('reports.index');
        Route::get('gin', 'ReportController@getGinReportView')->name('reports.gin');
        Route::get('gin_export', 'ReportController@exportGinReport')->name('reports.gin_export');
    });
});
