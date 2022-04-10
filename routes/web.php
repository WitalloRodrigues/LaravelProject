
<?php
use App\Http\Controllers\EventController;
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

Route::get('/','EventController@index');
Route::get('/events/create','EventController@create');
Route::get('/events/{id}', 'EventController@show');
Route::post('/events','EventController@store');
Route::delete('/events/{id}', 'EventController@destroy');
Route::get('/events/edit/{id}', 'EventController@edit');
Route::put('/events/update/{id}','EventController@update');

