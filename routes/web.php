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
    return view('home');
});

Auth::routes();

Route::get('/github', 'HomeController@index');
Route::get('/github', 'GitHubController@index');
// Route::get('/github/{username}', 'GitHubController@getRepos');
Route::get('/github/{repo}/{issue_count}', 'GitHubController@getIssues');

Route::resource('note', 'NoteController');
