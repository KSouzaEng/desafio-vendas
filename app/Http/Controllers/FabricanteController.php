<?php

namespace App\Http\Controllers;

use App\Models\Fabricante;
use Illuminate\Http\Request;
use App\User;

class FabricanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      $fabricantes = Fabricante::all();
     // dd($fabricantes);
      return view('fabricante.index', compact('fabricantes'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $fabricantes = Fabricante::create([
        'nome' => $request->nome,
        'site' => $request->site,
        'user_id' => auth()->user()->id,
    ]);
       return redirect('/fabricantes');
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
    public function edit(Fabricante $fabricantes, $id)
    {
        //
        $fabricantes = Fabricante::find($id);
      //  dd($fabricantes);
        return view('fabricante.edit', compact('fabricantes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fabricante  $fabricante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validaDados = $request->validate([
            'nome' => 'required',
            'site' => 'required'

            ]);

            Fabricante::whereId($id)->update($validaDados);
            return redirect('/fabricantes')->
            with('sucsess','Os dados foram atualizados!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fabricante  $fabricante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fabricante $fabricantes, $id)
    {


            $fabricantes = Fabricante::find($id);
           // dd($fabricantes);
            $fabricantes->delete();

            return redirect('/fabricantes');

    }
}
