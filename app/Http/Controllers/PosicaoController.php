<?php

namespace App\Http\Controllers;

use App\Models\Posicao;
use Illuminate\Http\Request;

class PosicaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posicao = new Posicao();
        $posicoes = Posicao::All();
        return view("posicao",[
            "posicao" => $posicao,
            "posicoes" => $posicoes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            $posicao= new Posicao();
        }else{
            $posicao= Posicao::Find($request->get("id"));
        }
        
        $posicao->nome=$request->get("nome");
        if($request->get("id")==""){
            
            $request->Session()->flash("acao","salvo");
        }else{
            
            $request->Session()->flash("acao","atualizado");
        }
        $posicao->save();
        return redirect("/posicao");
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
        $posicao = Posicao::Find($id);
        $posicoes = Posicao::ALL();
        return view("posicao",[
            "posicao" =>$posicao,
            "posicoes" =>$posicoes
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Posicao::Destroy($id);
        $request->Session()->flash("acao","deletado");
        return redirect("/posicao");
    }
}
