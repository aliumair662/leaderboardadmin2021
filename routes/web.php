<?php

use Illuminate\Support\Facades\Route;

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
    //return view('welcome');
    return redirect(route('login'));
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ManageLeaderboard', 'HomeController@ManageLeaderboard')->name('ManageLeaderboard');
Route::get('/CreateLeaderboard', 'HomeController@CreateLeaderboard')->name('CreateLeaderboard');
Route::get('/EditLeaderboard/{id}', 'HomeController@EditLeaderboard')->name('EditLeaderboard');
Route::get('/Leaderboard/{id}', 'HomeController@Leaderboard')->name('Leaderboard');
Route::get('/Noleaderboard', 'HomeController@Noleaderboard')->name('Noleaderboard');
Route::get('/Leaderboardends', 'HomeController@Leaderboardends')->name('Leaderboardends');
Route::get('/Users', 'HomeController@Users')->name('Users');
Route::post('/addLeaderboard', 'HomeController@addLeaderboard')->name('addLeaderboard');
Route::post('/updateLeaderboard', 'HomeController@updateLeaderboard')->name('updateLeaderboard');
Route::post('/latestMentionBoard', 'HomeController@latestMentionBoard')->name('latestMentionBoard');
Route::post('/savehowitworks', 'HomeController@savehowitworks')->name('savehowitworks');
Route::get('/UserListPdf', 'HomeController@UserListPdf')->name('UserListPdf');
Route::get('/UserListexport', 'HomeController@UserListexport')->name('UserListexport');
Route::get('/UserListexportCSV', 'HomeController@UserListexportCSV')->name('UserListexportCSV');
Route::post('/activeleaderBoard', 'HomeController@activeleaderBoard')->name('activeleaderBoard');
Route::get('/privacy', 'HomeController@privacy')->name('privacy');
