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

Route::get('/donate', 'Stripe\StripeController@config');
Route::post('/donate', 'Stripe\StripeController@charge');
