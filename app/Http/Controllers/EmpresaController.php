<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Ramo;

class EmpresaController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $registros = Empresa::with('ramo')->get();
       return view('empresa.list',['registros' => $registros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $ramos = Ramo::all();
       return view('empresa.create', ['ramos' => $ramos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
       $this->validate($request,['nome'=> 'required',]);
       
       $registro = new Empresa;
       $registro->nome = $request->nome;
       $registro->ramo_id = $request->ramo;
       
       $registro->save();
       return redirect()->route('empresa.index')->with('alert-success','Registro salvo com sucesso!');
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
       $registro = Empresa::findOrFail($id);
       $ramos = Ramo::all();
       return view('empresa.edit',['registro' => $registro, 'ramos' => $ramos]);
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
       $this->validate($request,['nome'=> 'required',]);
       
       $registro = Empresa::findOrFail($id);
       
       $registro->nome = $request->nome;
       $registro->ramo_id = $request->ramo;
       
       $registro->save();
       
       return redirect()->route('empresa.index')->with('alert-success','Registro salvo com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registro = Empresa::findOrFail($id);
        $registro->delete();
        return redirect()->back()->with('alert-success','Registro excluído com sucesso!');
    }
}
