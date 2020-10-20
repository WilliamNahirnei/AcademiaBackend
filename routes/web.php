<?php

use Illuminate\Support\Facades\Route;
use App\Models\Endereco;

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
Route::get('/Endereco',function(){
    $endereco=new Endereco();
    //$endereco->saveEndereco();
    //echo $endereco."</br>";
    //$endereco->setAllAtributs("Rua2","CEP","1414","CidadeTeste","Tocantins","Sem Muro","Perto da escola contine");
    //$endereco->updateEndereco();
    //echo $endereco->find(1);
    $endereco->getById(4);
    echo $endereco."</br>";
})
?>