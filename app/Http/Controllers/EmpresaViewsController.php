<?php

namespace App\Http\Controllers;

class EmpresaViewsController extends Controller
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
     * Mostra a lista de funcionarios da empresa
     */
    public function index(string $nomeEmpresa, int $idEmpresa)
    {
        $empresaController = new EmpresaController();
        $funcionarios = $empresaController
            ->buscaFuncionarios($idEmpresa);

        return view('/empresa/index', ['funcionarios' => $funcionarios, 'idEmpresa' => $idEmpresa]);
    }

    /**
     * Mostra o formulario de cadasrto de empresa
     */
    public function cadastro()
    {
        return view('/empresa/formulario/formulario-empresa');
    }

    /**
     * Mostra o formulario de alteracao dos dados da empresa
     */
    public function editar(int $idEmpresa)
    {
        $empresa = $this->buscaEmpresa($idEmpresa);
        return view('/empresa/formulario/formulario-empresa', ['empresa' => $empresa]);
    }

    /**
     * Busca informacoes da empresa
     */
    private function buscaEmpresa(int $idEmpresa)
    {
        $empresa = new EmpresaController();

        return $empresa->buscaEmpresa($idEmpresa);
    }
}
