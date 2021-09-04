<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FuncionarioViewsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Mostra o formulario de cadasrto de empresa
     */
    public function cadastro(int $idEmpresa)
    {
        return view('/funcionario/formulario/formulario-funcionario', ['idEmpresa' => $idEmpresa]);
    }

    /**
     * Mostra o formulario de alteracao dos dados da empresa
     */
    public function editar(int $idFuncionario)
    {
        $funcionario = $this->buscaFuncionario($idFuncionario);

        return view('/funcionario/formulario/formulario-funcionario', ['funcionario' => $funcionario]);
    }

    private function buscaFuncionario(int $idFuncionario)
    {
        $funcionario = new FuncionarioController();

        return $funcionario->buscaFuncionario($idFuncionario);
    }
}
