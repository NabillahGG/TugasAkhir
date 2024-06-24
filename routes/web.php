<?php

use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function(){
    return view('index');
});

Route::get('/buku', 'BukuController@bukutampil');
Route::post('/buku/tambah','BukuController@bukutambah');
Route::get('/buku/hapus/{kd_buku}','BukuController@bukuhapus');
Route::put('/buku/edit/{kd_buku}','BukuController@bukuedit');

Route::get('/kategori', 'KategoriController@kategoritampil');
Route::post('/kategori/tambah','KategoriController@kategoritambah');
Route::get('/kategori/hapus/{id_kategori}','KategoriController@kategorihapus');
Route::put('/kategori/edit/{id_kategori}','KategoriController@kategoriedit');

Route::get('/home', function(){return view('view_home');});

Route::get('/search',[BukuController::class,'search']);







