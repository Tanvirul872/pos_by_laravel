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

Route::prefix('suppliers')->group(function(){

      Route::get('/view', 'backend\SupplierController@view')->name('suppliers.view');
      Route::get('/add', 'backend\SupplierController@add')->name('suppliers.add');
      Route::post('/store', 'backend\SupplierController@store')->name('suppliers.store');
      Route::get('/edit/{id}', 'backend\SupplierController@edit')->name('suppliers.edit');
      Route::post('/update/{id}', 'backend\SupplierController@update')->name('suppliers.update');
      Route::get('/delete/{id}', 'backend\SupplierController@delete')->name('suppliers.delete');

    });


Route::prefix('customers')->group(function(){

    Route::get('/view', 'backend\CustomerController@view')->name('customers.view');
    Route::get('/add', 'backend\CustomerController@add')->name('customers.add');
    Route::post('/store', 'backend\CustomerController@store')->name('customers.store');
    Route::get('/edit/{id}', 'backend\CustomerController@edit')->name('customers.edit');
    Route::post('/update/{id}', 'backend\CustomerController@update')->name('customers.update');
    Route::get('/delete/{id}', 'backend\CustomerController@delete')->name('customers.delete');

});


Route::prefix('units')->group(function(){

    Route::get('/view', 'backend\UnitController@view')->name('units.view');
    Route::get('/add', 'backend\UnitController@add')->name('units.add');
    Route::post('/store', 'backend\UnitController@store')->name('units.store');
    Route::get('/edit/{id}', 'backend\UnitController@edit')->name('units.edit');
    Route::post('/update/{id}', 'backend\UnitController@update')->name('units.update');
    Route::get('/delete/{id}', 'backend\UnitController@delete')->name('units.delete');

});


Route::prefix('categories')->group(function(){

    Route::get('/view', 'backend\CategoryController@view')->name('categories.view');
    Route::get('/add', 'backend\CategoryController@add')->name('categories.add');
    Route::post('/store', 'backend\CategoryController@store')->name('categories.store');
    Route::get('/edit/{id}', 'backend\CategoryController@edit')->name('categories.edit');
    Route::post('/update/{id}', 'backend\CategoryController@update')->name('categories.update');
    Route::get('/delete/{id}', 'backend\CategoryController@delete')->name('categories.delete');

});

Route::prefix('brands')->group(function(){

    Route::get('/view', 'backend\BrandController@view')->name('brands.view');
    Route::get('/add', 'backend\BrandController@add')->name('brands.add');
    Route::post('/store', 'backend\BrandController@store')->name('brands.store');
    Route::get('/edit/{id}', 'backend\BrandController@edit')->name('brands.edit');
    Route::post('/update/{id}', 'backend\BrandController@update')->name('brands.update');
    Route::get('/delete/{id}', 'backend\BrandController@delete')->name('brands.delete');

});

Route::prefix('products')->group(function(){

    Route::get('/view', 'backend\ProductController@view')->name('products.view');
    Route::get('/add', 'backend\ProductController@add')->name('products.add');
    Route::post('/store', 'backend\ProductController@store')->name('products.store');
    Route::get('/edit/{id}', 'backend\ProductController@edit')->name('products.edit');
    Route::post('/update/{id}', 'backend\ProductController@update')->name('products.update');
    Route::get('/delete/{id}', 'backend\ProductController@delete')->name('products.delete');

});

Route::prefix('purchase')->group(function(){

    Route::get('/view', 'backend\PurchaseController@view')->name('purchase.view');
    Route::get('/add', 'backend\PurchaseController@add')->name('purchase.add');
    Route::post('/store', 'backend\PurchaseController@store')->name('purchase.store');
    Route::get('/edit/{id}', 'backend\PurchaseController@edit')->name('purchase.edit');
    Route::post('/update/{id}', 'backend\PurchaseController@update')->name('purchase.update');
    Route::get('/delete/{id}', 'backend\PurchaseController@delete')->name('purchase.delete');

});


    Route::get('/get-category', 'backend\DefaultController@getCategory')->name('get-category');


});



