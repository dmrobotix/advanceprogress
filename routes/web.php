<?php
use App\ModelLegislation;
use App\Mail\ContactForm;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
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
    //return view('front');
    return view('bulma.leap-home');
});
Route::get('/about', function () {

    return view('bulma.leap-about');


    /* xommit this */
});

Route::get('/project', function () {

  return view('bulma.project');
});

Route::get('/law', function () {
    return view('singlelaw');
});


Route::post('/', function(Request $formdata) {
  // validate email
  $validateData = $formdata->validate([
    'name' => 'bail|required',
    'email' => 'required',
    'message' => 'required'
  ]);
  // send email
    Mail::to('admin@advanceprogress.org')->send(new ContactForm($formdata));
    session()->flash('status', 'Email sent! You\'ll receive a response soon.');
    return redirect('/');
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
    return view('bulma.leap-about');
});


Route::get('/resources', function () {
    return view('resources');
});

Route::get('/map', function() {
  return view('map');
});

Route::post('/map', 'ExistingLegislationController@geochartData');

Route::get('/donate', 'Stripe\StripeController@config');
Route::post('/donate', 'Stripe\StripeController@charge');

/* Blog resource route */
Route::resource('blog', 'BlogController');
//Route::get('/blog/{page}','BlogController@nthindex');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
