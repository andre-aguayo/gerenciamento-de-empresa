<?php

namespace App\Http\Controllers;

use App\Http\Requests\FuncionarioRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Funcionario;

class FuncionarioController extends Controller
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
     * Cria o quadro de trabalho e o acesso ao usuario para o quado de trabalho
     */
    public function create(FuncionarioRequest $request)
    {
        if (Funcionario::create([
            'nome' => $request->nome,
            'sobrenome' => $request->sobrenome,
            'empresa_id' => $request->empresa_id,
            'email' => $request->email,
            'telefone' => $request->telefone
        ])) {
            return redirect('/')->with('success', 'Cadastrado com sucesso!');
        }
        return redirect('/')->with('error', 'Algo de errado ao cadastrar a empresa!');
    }

    public function update(FuncionarioRequest $request)
    {
        if (Funcionario::find($request->id)
            ->update([
                'nome' => $request->nome,
                'sobrenome' => $request->sobrenome,
                'email' => $request->email,
                'telefone' => $request->telefone
            ])
        ) {
            return redirect('/')->with('success', 'Cadastrado com sucesso!');
        }
        return redirect('/')->with('error', 'Algo de errado ao cadastrar a empresa!');
    }

    public function delete(int $idFuncionario)
    {
        if (Funcionario::find($idFuncionario)->delete()) {
            return redirect('/')->with('success', 'Funcionario removida com sucesso!');
        }
        return redirect('/')->with('error', 'Algo deu errado ao remover o funcionario!');
    }

    public function buscaFuncionario(int $idFuncionario)
    {
        return Funcionario::find($idFuncionario);
    }

    public function buscaFuncionariosDaEmrpesa($idEmpresa)
    {
        $funcionarios = DB::table('funcionarios')->where('empresa_id', $idEmpresa)->paginate(10);
        
        return $funcionarios;
    }
}
