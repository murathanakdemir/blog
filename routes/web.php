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

use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>['admin_mi','auth']],function (){
    Route::group(['namespace'=>'Admin'],function (){
        Route::get('/site-ayarlari','AyarController@index');
        Route::put('/site-ayarlari/guncelle','AyarController@guncelle');
        Route::resource('user','UserController');
        Route::resource('kategori','KategoriController');
        Route::resource('makale','MakaleController');
        Route::post('/makale/durum-degis','MakaleController@durumDegis');
        Route::get('/talep','TalepController@index');
        Route::post('/talep/durum-degis','TalepController@durumDegis');
        Route::delete('/talep/{id}','TalepController@sil');

    });
});

Route::group(['middleware'=>['yazar_mi','auth']],function (){
    Route::group(['namespace'=>'Yazar'],function (){
        Route::resource('makalelerim','MakaleController');
    });
});

Route::get('/yazarlik-talebi', 'YazarlikTalepController@index');
Route::post('/yazarlik-talebi/gonder', 'YazarlikTalepController@gonder');
