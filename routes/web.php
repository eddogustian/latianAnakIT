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
Route::resource('file','File');
Route::resource('kontak','Kontak'); //tambahkan baris ini
// Route::get('kontak/getdata','KontakController@getdata')->name('kontak.getdata');
Route::get ( '/', function () {
    $data = Data::all ();
    return view ( 'kontak','Kontak' )->withData ( $data );
} );

Route::get('/', function () {
    return view('index');
});

Route::get('/halaman-kedua', function () {
    return view('halamandua');
});
Route::get('/user', 'User@index');
Route::get('/login', 'User@login');
Route::post('/loginPost', 'User@loginPost');
Route::get('/register', 'User@register');
Route::post('/registerPost', 'User@registerPost');
Route::get('/logout', 'User@logout');

//email
Route::get('/email', function () {
    return view('send_email');
});
Route::post('/sendEmail', 'Email@sendEmail');

Route::get('import-export-view', 'ExcelController@importExportView')->name('import.export.view');
Route::post('import-file', 'ExcelController@importFile')->name('import.file');
Route::get('export-file/{type}', 'ExcelController@exportFile')->name('export.file');
