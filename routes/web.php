<?php
use App\Http\Controllers\HomeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'Frontend\FrontenController@index');

Auth::routes();


Route::group(['middleware' =>['auth','customer']],function(){
   Route::get('/dashboard','Frontend\DashboardController@dashboard')->name('dashboard');
});



Route::group(['middleware'=>['auth','admin']],function(){

Route::prefix('users')->group(function(){

//admin-dashboard
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/view', 'backend\UserController@view')->name('users.view');
    Route::get('/add', 'backend\UserController@add')->name('users.add');
    Route::post('/store', 'backend\UserController@store')->name('users.store');
    Route::get('/edit/{id}', 'backend\UserController@edit')->name('users.edit');
    Route::post('/update/{id}', 'backend\UserController@update')->name('users.update');
    Route::get('/delete/{id}', 'backend\UserController@delete')->name('users.delete');

  });





//profile route
Route::prefix('profiles')->group(function(){

    Route::get('/view', 'backend\ProfileController@view')->name('profiles.view');
    Route::get('/edit/', 'backend\ProfileController@edit')->name('profiles.edit');
    Route::post('/update', 'backend\ProfileController@update')->name('profiles.update');

});



});



