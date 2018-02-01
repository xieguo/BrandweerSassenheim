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

/**
 * Administration
 */
Route::group(['auth'], function()
{
    Route::get('uitrukken/{report}/edit', 'ReportController@edit')->name('report.edit');
    Route::get('uitrukken', 'ReportController@index')->name('report.index');
    Route::get('uitrukken/create', 'ReportController@create')->name('report.create');
    Route::post('uitrukken', 'ReportController@store')->name('report.store');
    Route::put('uitrukken/{report}', 'ReportController@update')->name('report.update');
    Route::delete('uitrukken/{report}', 'ReportController@destroy')->name('report.destroy');

    Route::get('artikelen/{article}/edit', 'ArticleController@edit')->name('article.edit');
    Route::get('artikelen/create', 'ArticleController@create')->name('article.create');
    Route::post('artikelen', 'ArticleController@store')->name('article.store');
    Route::put('artikelen/{article}', 'ArticleController@update')->name('article.update');
    Route::delete('artikelen/{article}', 'ArticleController@delete')->name('article.delete');

    Route::post('files', 'FileController@store')->name('file.store');
    Route::put('files/{file}', 'FileController@update')->name('file.update');
    Route::delete('files/{file}', 'FileController@destroy')->name('file.destroy');

    Route::get('tips/create', 'TipController@create')->name('tips.create');
});

Route::get('/', 'SiteController@index')->name('home');
Route::get('home', 'SiteController@index')->name('home');
Route::get('p2000', 'SiteController@p2000')->name('p2000');
Route::get('contact', 'SiteController@contact')->name('contact');

Route::get('uitrukken/{year}', 'ReportController@index')->name('report.year');
Route::get('uitruk/{date}/{report}/{slug}', 'ReportController@show')->name('report.show');

Route::get('artikelen/{article}/{slug}', 'ArticleController@show')->name('article.show');
Route::get('artikelen/{type}', 'ArticleController@index')->name('article.type')->where('name', '[A-Za-z]+');

// Every article type gets its own route
foreach (config('types') as $key => $type)
{
    Route::get($key, 'ArticleController@type')->defaults('type', $key)->name($key);
}

Route::get('admin', function() {
    return redirect(route('login'));
});
