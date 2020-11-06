<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AddressController;
use App\Http\Controllers\LicenseTypeController;
use App\Http\Controllers\UserTypeController;
use App\Http\Controllers\UserController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
//Route::apiResource('Usuario',UserController::class);


Route::get('/Endereco/{idAddress}',[AddressController::class,'getAddress']);
Route::post('/InserirEndereco',[AddressController::class,'insertAddress']);
Route::put('/EditarEndereco',[AddressController::class,'updateAddress']);
Route::delete('/ExcluirEndereco',[AddressController::class,'deleteAddress']);


Route::get('/Usuario/{idUser}',[UserController::class,'getUserById']);
Route::get('/Usuario/NomeCompleto/{UserFullName}',[UserController::class,'getUserByFullName']);
Route::get('/Usuario/CPF/{UserCPF}',[UserController::class,'getUserByCPF']);
Route::post('/InserirUsuario',[UserController::class,'insertUser']);
Route::put('/EditarUsuario',[UserController::class,'updateUser']);

?>