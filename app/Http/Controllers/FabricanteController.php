<?php

namespace App\Http\Controllers;

use App\Models\Fabricante;
use Illuminate\Http\Request;
use App\Http\Requests\FabricanteRequest;
use App\DataTables\FabricanteDataTable;
use App\Services\FabricanteService;
use RealRashid\SweetAlert\Facades\Alert;

class FabricanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FabricanteDataTable $fabricanteDataTable)
    {
      return $fabricanteDataTable->render('fabricante.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('fabricante.FormCreate');
    }

    public function store(FabricanteRequest $request)
    {
        $fabricante = FabricanteService::store($request->all());

        if($fabricante){
            Alert::success($request->nome, 'Salvo!!');
            return back();
        }else{
            Alert::error($request->nome, 'Erro ao Salvar');
        }
        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fabricante  $fabricante
     * @return \Illuminate\Http\Response
     */
    public function show(Fabricante $fabricante)
    {
        //
        return view('fabricante.show');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fabricante  $fabricante
     * @return \Illuminate\Http\Response
     */
    public function edit(Fabricante $fabricante)
    {
        //
        return view('fabricante.FormCreate', compact('fabricante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fabricante  $fabricante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Fabricante $fabricante)
    {
        //
        $fabricante = FabricanteService::update($request->all(),$fabricante);

        if($fabricante){

            flash('Fabricante atualixado com sucesso')->succsess();
        }
        else{
            flash('Erro ao atualizar')->error();
        }
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fabricante  $fabricante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fabricante $fabricantes,$id,Request $request)
    {

        try {
            $fabricantes = Fabricante::find($id);
            $fabricantes->delete();
            Alert::success($request->nome, 'Excluído!!');
        } catch (Throwable $th) {
            Alert::error($request->nome, 'Erro ao Excluir');
        }
    }
}
