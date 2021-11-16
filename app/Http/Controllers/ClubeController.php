<?php

namespace App\Http\Controllers;
use App\Models\Clube;
use Illuminate\Http\Request;

class ClubeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clube = new Clube();
        $clubes = Clube::All();
        return view("clube",[
            "clube" => $clube,
            "clubes" => $clubes
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
            $clube= new Clube();
        }else{
            $clube= Clube::Find($request->get("id"));
        }
        $url = $request->file("nomeEscudo")->store('public/logos');
        $url = str_replace("public/", "storage/", $url);
        $clube->url = $url;
        $clube->nome=$request->get("nome");
        if($request->get("id")==""){
            
            $request->Session()->flash("acao","salvo");
        }else{
            
            $request->Session()->flash("acao","atualizado");
        }
        $clube->save();
        return redirect("/clube");
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
        $clube =  Clube::Find($id);
		$clubes = clube::All();
        return view("clube", [
			"clube" => $clube,
			"clubes" => $clubes
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
    public function destroy($id, Request $request)
    {
        Clube::Destroy($id);
		$request->Session()->Flash("status", "excluido");
		return Redirect("/clube");
    }
}
