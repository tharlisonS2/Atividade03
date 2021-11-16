<?php

namespace App\Http\Controllers;
use App\Models\Jogador;
use App\Models\Posicao;
use App\Models\Clube;
use Illuminate\Http\Request;

class JogadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->get("id")==""){
            $jogador= new Jogador();
        }else{
            $jogador= Jogador::Find($request->get("id"));
        }
        $hoje = \Carbon\Carbon::now();
        if($request->get("dataNascimento")>$hoje){
            $request->Session()->flash("acao","errodata");
            return redirect("/jogador");
        }
        $jogador->nome=$request->get("nome");
        $jogador->dataNascimento=$request->get("dataNascimento");
        $jogador->posicao=$request->get("posicao");
        $jogador->clube=$request->get("clube");
        $jogador->check="false";
        
        
        
        if($request->get("id")==""){
            
            $request->Session()->flash("acao","salvo");
        }else{
            
            $request->Session()->flash("acao","atualizado");
        }
        $jogador->save();
        return redirect("/jogador");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jogador = jogador::Find($id);
        $jogadores = jogador::ALL();
        $posicao = Posicao::Find($id);
        $posicoes = Posicao::ALL();
        $clube = Clube::ALL();
        $clubes = Clube::ALL();
        return view("jogador",[
            "jogador" => $jogador,
            "clube" => $clube,
            "posicao" => $posicao,
            "jogadores" => $jogadores,
            "posicoes" =>$posicoes,
            "clubes" =>$clubes
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jogador= Jogador::Find($id);
        $jogador->check="true";
        $jogador->save();
        return redirect("/jogador");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        Jogador::Destroy($id);
        $request->Session()->flash("acao","deletado");
        return redirect("/jogador");
    }
}
