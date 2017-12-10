<?php
use App\ModelLegislation;
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
    return view('front');
});

Route::get('/database', function () {
  $lg = ModelLegislation::all();
  return view('database', ['legislation' => $lg]);
});

Route::get('/legislation/{id}',function($id) {
  $lg = ModelLegislation::where('mleg_id',$id)->first();
  return view('legislation',['legislation' => $lg]);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/resources', function () {
    return view('resources');
});

Route::get('/donate', 'Stripe\StripeController@config');
Route::post('/donate', 'Stripe\StripeController@charge');

/* Blog resource route */
Route::resource('blog', 'BlogController', ['only' => ['index','create','store','show','edit','destroy']]);
Route::get('/blog/{page}','BlogController@nthindex');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
