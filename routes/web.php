<?php

use Illuminate\Http\Response;

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

/**
 * Authentication
 */
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');

/**
 * Administration
 */
Route::group(['auth', 'prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function()
{
    Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::resource('articles', 'ArticleController');
    Route::resource('reports', 'ReportController');
    Route::resource('tips', 'TipController');

    Route::post('files', 'FileController@store')->name('file.store');
    Route::put('files/{file}', 'FileController@update')->name('file.update');
    Route::delete('files/{file}', 'FileController@destroy')->name('file.destroy');
});

Route::get('/', 'SiteController@index')->name('home');
Route::get('home', 'SiteController@index')->name('home');
Route::get('p2000', 'SiteController@p2000')->name('p2000');
Route::get('contact', 'SiteController@contact')->name('contact');

Route::get('uitrukken', 'ReportController@index')->name('reports.index');
Route::get('uitrukken/{year}', 'ReportController@index')->name('reports.year');
Route::get('uitruk/{date}/{report}/{slug}', 'ReportController@show')->name('reports.show');

Route::get('artikelen/{article}/{slug}', 'ArticleController@show')->name('articles.show');
Route::get('artikelen/{type}', 'ArticleController@index')->name('articles.type')->where('name', '[A-Za-z]+');

// Every article type gets its own route
foreach (config('types') as $key => $type)
{
    Route::get($key, 'ArticleController@type')->defaults('type', $key)->name($key);
}

Route::get('admin', function() {
    return redirect(route('login'));
});

// Legacy redirects
Route::get('p2000-monitor', function () { return redirect(route('p2000'), Response::HTTP_MOVED_PERMANENTLY); });
