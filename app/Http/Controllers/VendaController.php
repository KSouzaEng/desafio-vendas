<?php

namespace App\Http\Controllers;
use App\DataTables\VendaDataTable;
use App\Models\Venda;
use App\Services\VendaService;
use Illuminate\Http\Request;


use App\rc;


class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(VendaDataTable $vendaDataTable)
    {
        return $vendaDataTable->render('venda.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('venda.form',[
            'formasPagamento' => Venda::FORMAS_PAGAMENTO
        ]);

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
        $venda = VendaService::store($request);
        if($venda){
            flash('Venda Finalizada com sucesso')->sucess();
            return response('',201);
        }
        return response('Erro ao salvar a venda', 400);
    }


    public function show(Venda $venda)
    {
        try {
            return view('venda.details', compact('venda'));
        } catch (\Throwable $th) {
            flash('Ops! Ocorreu um erro ao exibir a venda')->error();
            return back();
        }
    }

    // public function edit(rc $rc)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\rc  $rc
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, rc $rc)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\rc  $rc
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(rc $rc)
    // {
    //     //
    // }
}
