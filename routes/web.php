<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\LicenseTypeController;
use App\Http\Controllers\UserTypeController;
use App\Http\Controllers\UserController;

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
    return view('welcome');
});
// Route::get('/Endereco/{idAddress}',[AddressController::class,'getAddress']);
// Route::post('/InserirEndereco',[AddressController::class,'insertAddress']);
// Route::put('/EditarEndereco',[AddressController::class,'updateAddress']);
// Route::delete('/ExcluirEndereco',[AddressController::class,'deleteAddress']);


// // Route::get('/Usuario/{idUser}',[UserController::class,'getUserById']);
// // Route::post('/InserirUsuario',[UserController::class,'insertUser']);
// // Route::put('/EditarUsuario',[UserController::class,'updateUser']);
// // Route::delete('/ExcluirUsuario',[UserController::class,'delteUser']);



Route::get('/TesteDeLicencas',[LicenseTypeController::class,'Teste']);
Route::get('/TesteDeTiposDeUsuario',[UserTypeController::class,'Teste']);


?>