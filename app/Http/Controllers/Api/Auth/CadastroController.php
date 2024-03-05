<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cadastro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CadastroController extends Controller
{
    public function show(Cadastro $cadastro, Request $request)
    {
        $user = Auth::user();
        $cadastros = $user->cadastros;
        $count = $cadastros->count();
        
        return response()->json([
            'Numero de registros' => $count,
            'cadastros' => $cadastros
        ]);
        
    }

    public function store(Request $request)
    {
        if(!$request->descricao || !$request->estado || !$request->setor || !$request->categoria){
            return response()->json([
                'mensagem' => 'Campos obrigatórios precisam ser preenchidos.',
                'campos obrigatórios' => 'Descrição, Estado, Setor e Categoria'
            ]);
        }
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

        if(!$data){
            return response()->json([
                'mensagem' => 'Cadastro não foi realizado.'
            ]);
        }

        return response()->json([
            'mensagem' => 'Cadastro realizado com sucesso.'
        ]);

    }

    public function update(Request $request, Cadastro $cadastro, $id)
    {
        if(!$request->descricao || !$request->estado || !$request->setor || !$request->categoria){
            return response()->json([
                'mensagem' => 'Campos obrigatórios precisam ser preenchidos.',
                'campos obrigatórios' => 'Descrição, Estado, Setor e Categoria'
            ]);
        }

        if(!$cadastro = $cadastro->find($id)){
            return response()->json([
                'mensagem' => 'Cadastro não encontrado.'
            ]);
        }

        $cadastro->update($request->only([
            'codigo',
            'descricao',
            'marca',
            'modelo',
            'colaborador',
            'valor',
            'estado',
            'setor',
            'categoria',
            'observacoes'
        ]));
       
        return response()->json([
            'mensagem' => 'Cadastro atualizado com sucesso.'
        ]);
    }

    public function delete(Request $request, $id)
    {
        $cadastro = Cadastro::where('id', $id)->first();

        if(empty($cadastro)){
            return response()->json([
                'id'        => $cadastro,
                'menssagem' => 'Cadastro não encontrado.'
            ]);
        }

        $cadastro->delete();

        return response()->json([
            'menssagem' => 'Cadastro excluido com sucesso.'
        ]);
        

        
    }

    public function show_id(Request $request, $id) 
    {
        $cadastro = Cadastro::where('id', $id)->first();

        if(empty($cadastro)){
            return response()->json([
                'id'        => $cadastro,
                'menssagem' => 'Cadastro não encontrado.'
            ]);
        }

        return response()->json($cadastro);
    }

    public function busca(Request $request)
    {

       /*  
        ##Json para busca##
        {
            "codigo": "",
            "descricao": "",
            "setor": "",
            "categoria": ""
        } */

        $filtro = $request->only([
            'codigo',
            'descricao',
            'setor',
            'categoria'
        ]);

        $cadastros = Auth::user()->cadastros;
        $user_id = Auth::user()->id;

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
        
        $count = $cadastros->count();
    
        return response()->json([
            'cadastros' => $cadastros,
            'Numero de registros' => $count
        ]);
    }
}
