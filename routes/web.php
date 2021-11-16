<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosicaoController;
use App\Http\Controllers\ClubeController;
use App\Http\Controllers\JogadorController;

use App\Models\Posicao;
use App\Models\Clube;
use App\Models\Jogador;
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
Route::resources([
    "posicao" => PosicaoController::class,
    "clube" => ClubeController::class,
    "jogador" => JogadorController::class
]);
Route::get('posicao',function(){
    $posicao = new Posicao();
    $posicoes = Posicao::ALL();
    return view("posicao",[
        "posicao" =>$posicao,
        "posicoes" =>$posicoes]);
    })->name('posicao');
Route::get('clube',function(){
        $clube = new Clube();
        $clubes = Clube::ALL();
        return view("clube",[
            "clube" =>$clube,
            "clubes" =>$clubes]);
        })->name('clube');

Route::get('/jogador',function(){
    $jogador = new Jogador();
    $jogadores = Jogador::All();
    $posicoes = Posicao::ALL();
    $clubes = Clube::ALL();
    return view("jogador",[
        "jogador" => $jogador,
        "jogadores" => $jogadores,
        "posicoes" =>$posicoes,
        "clubes" =>$clubes
    ]);
        })->name('jogador');
Route::get('/', function () {
    $jogador = new Jogador();
    $jogadores = Jogador::All();
    $posicoes = Posicao::ALL();
    $clubes = Clube::ALL();
    return view("index",[
        "jogador" => $jogador,
        "jogadores" => $jogadores,
        "posicoes" =>$posicoes,
        "clubes" =>$clubes]);
});
