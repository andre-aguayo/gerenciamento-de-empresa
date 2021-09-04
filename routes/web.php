<?php

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EmpresaViewsController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\FuncionarioViewsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

/**
 * Grupo de rotas para gestao da empresa
 */
Route::group(['prefix' => 'empresa'], function () {

    //Visualizar os funcionarios da empresa
    Route::get('/visualizar/{nomeEmpresa}/{idEmpresa}', [EmpresaViewsController::class, 'index'])->name('home');

    //Pagina de cadastro de nova empresa
    Route::get('/cadastro', [EmpresaViewsController::class, 'cadastro'])->name('create_empresa');

    //Salva a empresa 
    Route::post('/salvar', [EmpresaController::class, 'create']);

    //Pagina de ediçao de informaçoes da emrpesa
    Route::get('/editar/{id}', [EmpresaViewsController::class, 'editar'])->name('update_empresa');

    //Salva as alteraçoes da empresa
    Route::post('/atualizar/{id}', [EmpresaController::class, 'update']);

    //Remove a empresa
    Route::get('/remover/{id}', [EmpresaController::class, 'delete'])->name('delete_empresa');
});

/**
 * Rotas para o gestao do funcionario
 */
Route::group(['prefix' => 'funcionario'], function () {

    //Pagina de formulario para cadastro de funcionario
    Route::get('/cadastro/{empresa_id}', [FuncionarioViewsController::class, 'cadastro'])->name('create_funcionario');

    //Salva o funcionario 
    Route::post('/salvar/{empresa_id}', [FuncionarioController::class, 'create']);

    //Pagina de ediçao de informaçoes da emrpesa
    Route::get('/editar/{id}', [FuncionarioViewsController::class, 'editar'])->name('update_funcionario');

    //Salva as alteraçoes da empresa
    Route::post('/atualizar/{id}', [FuncionarioController::class, 'update']);

    //Remove o usuario da empresa
    Route::get('/remover/{id}', [FuncionarioController::class, 'delete'])->name('delete_funcionairo');
});
