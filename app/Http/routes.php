<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
/*Route::get('/', function() {
    $pdf = PDF::make();
    $pdf->addPage('<html><head></head><body><b>Hello World</b></body></html>');
    $pdf->send();
});*/

//Route::get('home', 'HomeController@index');

Route::resource('user', 'UserController');

///////////////////////////////////////////

Route::get('konsumen', 'MasterController@konsumen');
Route::get('konsumen/create', 'MasterController@konsumenCreate');
Route::post('konsumen/create', 'MasterController@konsumenCreate');
Route::get('konsumen/edit/{id}', 'MasterController@konsumenEdit');
Route::post('konsumen/edit/{id}', 'MasterController@konsumenEdit');
Route::get('konsumen/delete/{id}', 'MasterController@konsumenDelete');

///////////////////////////////////////////
Route::get('jabatan', 'MasterController@jabatan');
Route::get('jabatan/create', 'MasterController@jabatanCreate');
Route::post('jabatan/create', 'MasterController@jabatanCreate');
Route::get('jabatan/edit/{id}', 'MasterController@jabatanEdit');
Route::post('jabatan/edit/{id}', 'MasterController@jabatanEdit');
Route::get('jabatan/delete/{id}','MasterController@jabatanDelete');

/////////////////////////////////////////////////
Route::get('pegawai', 'MasterController@pegawai');
Route::get('pegawai/create', 'MasterController@pegawaiCreate');
Route::post('pegawai/create', 'MasterController@pegawaiCreate');
Route::get('pegawai/edit/{id}', 'MasterController@pegawaiEdit');
Route::post('pegawai/edit/{id}', 'MasterController@pegawaiEdit');
Route::get('pegawai/delete/{id}','MasterController@pegawaiDelete');

/////////////////////////////////////////////////
Route::get('cabang', 'MasterController@cabang');
Route::get('cabang/create', 'MasterController@cabangCreate');
Route::post('cabang/create', 'MasterController@cabangCreate');
Route::get('cabang/edit/{id}', 'MasterController@cabangEdit');
Route::post('cabang/edit/{id}', 'MasterController@cabangEdit');
Route::get('cabang/delete/{id}','MasterController@cabangDelete');

////////////////////////////////////////////////
Route::get('armada', 'MasterController@armada');
Route::get('armada/create', 'MasterController@armadaCreate');
Route::post('armada/create', 'MasterController@armadaCreate');
Route::get('armada/edit/{id}', 'MasterController@armadaEdit');
Route::post('armada/edit/{id}', 'MasterController@armadaEdit');
Route::get('armada/delete/{id}','MasterController@armadaDelete');

/////////////////////////////////////////////////

//Route::get('kota', 'MasterController@kota');

/////////////////////////////////////////

Route::get('mutasi', 'LaporanController@mutasi');

/*Route::get('penagihan', function(){
	return view('errors/maintenance');
});
Route::get('pendapatan', function(){
	return view('errors/maintenance');
});
Route::get('resipengiriman', function(){
	return view('errors/maintenance');
});
Route::get('sjt', function(){
	return view('errors/maintenance');
});
*/

Route::get('penagihan', 'LaporanController@penagihan');
Route::get('pendapatan', 'LaporanController@pendapatan');
Route::get('resipengiriman', 'LaporanController@resipengiriman');
Route::get('sjt', 'LaporanController@sjt');



// World outside routing //////////////
Route::get('about', function(){view('world.about');});
//Route::get('tracking', view('world.tracking'));

////////////////////////////////////////

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('print', 'HomeController@cetak');
