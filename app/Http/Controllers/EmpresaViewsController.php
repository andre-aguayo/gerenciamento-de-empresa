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
     * Mostra a lista de funcionarios da empresa se existir
     * Caso nao exista redireciona para a pagina inicial
     */
    public function index(string $nomeEmpresa, int $idEmpresa)
    {
        //verifica se a empresa existe
        $empresa = $this->buscaEmpresa($idEmpresa);
        if ($empresa !== NULL) {
            $empresaController = new EmpresaController();
            $funcionarios = $empresaController->buscaFuncionarios($idEmpresa);

            return view('vue-router', ['funcionarios' => $funcionarios, 'idEmpresa' => $idEmpresa]);
        }

        return redirect('/')->with('error', 'Empresa nao encontrada!');
    }

    /**
     * Mostra o formulario de cadasrto de empresa
     */
    public function create()
    {
        return view('vue-router');
    }

    /**
     * Mostra o formulario de alteracao dos dados da empresa caso exista
     * Casno nao, redireciona para a pagina inicial
     */
    public function show(int $idEmpresa)
    {
        //verifica se a empresa existe
        $empresa = $this->buscaEmpresa($idEmpresa);
        if ($empresa === null) {
            return   redirect('/')->with('error', 'Empresa nao encontrada!');
        }
        return view('vue-router', ['empresa' => $empresa]);
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
