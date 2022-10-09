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

// Route::get('/', function () {
//     return view('welcome');
// });



//show machines
Route::get('/machines', function () {

    $devices = App\Models\Pos::all();

    return view('admin.payments.devices' , compact('devices'));
})->name('machines');

// end show machines

//simulator pages

Route::get('/simulator/{device}', function (\App\Models\Pos $device ) {
    return view('admin.payments.simulator',['device' => $device]);
  })->name('simulator');

Route::get('/adsl', function () {
  return view('admin.payments.adsl');
})->name('adsl');
 
// electricity service pages
Route::get('/electricity_service/{device}', function (\App\Models\Pos $device) {
  return view('admin.payments.electricity_service',['device' => $device]);
})->name('electricity_service');

// electricity bills

Route::get('/electricity_bill/{device}', function (\Symfony\Component\HttpFoundation\Request $request , \App\Models\Pos $device) {
  $counter = \App\Models\Postpaid::where('user_service_number', 'like', '%' . $request->number . '%')->first();
            
  return view('admin.payments.electricity_bill' ,['counter'=> $counter , 'device'=> $device]);
})->name('electricity_bill');

Route::get('/show_bill/{counter}/pos/{device}', function (\App\Models\Postpaid $counter , \App\Models\Pos $device) {
   
  return view('admin.payments.show_bill' ,['counter'=> $counter , 'device'=> $device]);
})->name('show_bill');

Route::post('/bill_payment/{counter}', function (\Symfony\Component\HttpFoundation\Request $request ,  $counter) {

  $counter = \App\Models\Postpaid::where( 'id' , $counter )->first();
      $counter->status = $request->input('status');
      $counter->category_id = $request->input('category_id');
      $counter->pos_id = $request->input('pos_id');
       $counter->update();
       event(new App\Events\Counters($counter));
       return back()->with('success', 'تم دفع الفتورة بنجاح');
})->name('bill_payment');

// end electricity bills

// electricity cards

Route::get('/electricity_card', function (\Symfony\Component\HttpFoundation\Request $request) {
  $card = \App\Models\Prepaid::where('user_service_number', 'like', '%' . $request->number . '%')->get();
            
  return view('admin.payments.‏‏electricity_card' , compact('card'));
})->name('electricity_card');

Route::get('/show_card/{card}', function (\App\Models\Prepaid $card) {
   
  return view('admin.payments.showCard', compact('card')); 
})->name('show_card');

Route::post('/card_payment/{card}', function (\Symfony\Component\HttpFoundation\Request $request , $card) {

  $card =\App\Models\Prepaid::where( 'id' , $card )->first();

      $card->value = $request->value;
      $card->status = $request->input('status');
      $card->category_id = $request->input('category_id');
       $card->update();
       event(new App\Events\Cards($card));
       return back()->with('success', 'تم شحن الكرت بنجاح');
 })->name('card_payment');


Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');

Auth::routes();

Route::get('/dashboard', 'Admin\HomeController@index')->name('dashboard');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/getallcounters', 'ApiIntegration\ElectricityController@getElectricityCounters');

Route::get('/getallcards', 'ApiIntegration\ElectricityController@getElectricityCards');

Route::resource('users','Admin\UserController');

Route::resource('categories','Admin\CategoryController');

Route::resource('services','Admin\ServiceController');

Route::resource('companies','Admin\CompanyController');

Route::resource('devices','Admin\PosController');

Route::resource('locations','Admin\LocationController');

// balances module 

Route::get('/balances', 'Admin\BalanceController@index')->name('balances.index');

Route::get('/balances/{device}/add', 'Admin\BalanceController@create')->name('balancesAdd');

Route::post('/balances/{device}', 'Admin\BalanceController@store')->name('balancesStore');

Route::get('/show/{device}/recharges', 'Admin\BalanceController@showRecharges')->name('show.recharges');

Route::get('/showdata', 'Admin\BalanceController@showdata');

Route::get('/exportexcel/{device}', 'Admin\BalanceController@exportExcel')->name('exportexcel.balances'); 

Route::get('/exportpdf/{device}', 'Admin\BalanceController@exportPdf')->name('exportpdf.balances'); 

// end balances module 

//transactions module

Route::get('/transactions', 'Admin\Transaction@index')->name('transactions.index');

Route::get('/transactions/{device}/add', 'Admin\BalanceController@create')->name('balancesAdd');

Route::post('/transactions/{device}', 'Admin\BalanceController@store')->name('balancesStore');

Route::get('/show/{device}/transactions', 'Admin\BalanceController@showRecharges')->name('show.recharges');

Route::get('/exportexcel/{device}', 'Admin\BalanceController@exportExcel')->name('exportexcel.balances'); 

Route::get('/exportpdf/{device}', 'Admin\BalanceController@exportPdf')->name('exportpdf.balances'); 

// end transactions module 








