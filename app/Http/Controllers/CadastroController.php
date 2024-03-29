<?php

namespace App\Http\Controllers;

use App\Models\Cadastro;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CadastroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cadastro.cadastrar');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $data = Cadastro::create([
            'user_id' => $user->id,
            'codigo' => $request->codigo,
            'descricao' => $request->descricao,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'colaborador' => $request->colaborador,
            'valor' => $request->valor,
            'estado' => $request->estado,
            'setor' => $request->setor,
            'categoria' => $request->categoria,
            'observacoes' => $request->observacoes
        ]);
        
        return view ('cadastro.cadastrar');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cadastro $cadastro)
    {
        $user = Auth::user();
        $cadastros = $user->cadastros;
        $count = $cadastros->count();

        return view('consulta.consulta', compact('cadastros', 'count'));
    }

    public function filtro(Request $request) 
    {
        
        $cadastros = Auth::user()->cadastros;
        $user_id = Auth::user()->id;
        //dd($user_id);

        if($request->codigo){
           $cadastros =  Cadastro::where('user_id', '=', $user_id)
                                    ->where('codigo', 'LIKE', '%' . $request->codigo . '%')->get();
        }

        if($request->descricao){
            $cadastros =  Cadastro::where('user_id', '=', $user_id)
                                     ->where('descricao', 'LIKE', '%' . $request->descricao . '%')->get();
         }

        if($request->categoria) {
            $cadastros = $cadastros->where('categoria', $request->categoria);
        }

        if($request->setor) {
            $cadastros = $cadastros->where('setor', $request->setor);
        }

        return view('consulta.consulta', compact('cadastros'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cadastro $cadastro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cadastro $cadastro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cadastro $cadastro)
    {
        //
    }
}
