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

Route::get('/', 'SiteController@index')->name('home');
Route::get('home', 'SiteController@index')->name('home');
Route::get('brandveiligheid', 'ArticleController@safety')->name('brandveiligheid');
Route::resource('tips', 'TipController');
Route::get('uitrukken/{report}/edit', 'ReportController@edit')->name('report.edit');
Route::resource('uitrukken', 'ReportController', [
    'except' => ['show'],
    'names' => [
        'index' => 'report.index',
        'create' => 'report.create',
        'store' => 'report.store',
        'update' => 'report.update',
        'delete' => 'report.delete',
    ]
]);
Route::get('artikelen/{article}/edit', 'ArticleController@edit')->name('article.edit');
Route::get('artikelen/{article}/{slug}', 'ArticleController@show')->name('article.show');
Route::resource('artikelen', 'ArticleController', [
    'except' => ['show'],
    'names' => [
        'index' => 'article.index',
        'create' => 'article.create',
        'store' => 'article.store',
        'update' => 'article.update',
        'delete' => 'article.delete',
    ]
]);
Route::get('uitrukken/{year}', 'ReportController@index')->name('report.year');
Route::get('uitruk/{date}/{report}/{slug}', 'ReportController@show')->name('report.show');
Route::get('p2000', 'SiteController@p2000')->name('p2000');
Route::get('contact', 'SiteController@contact')->name('contact');

Auth::routes();

/**
 * Administration
 */
Route::get('admin', function() {
    return redirect(route('login'));
});
