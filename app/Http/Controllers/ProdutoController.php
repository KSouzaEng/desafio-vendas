<?php

namespace App\Http\Controllers;

use App\DataTables\produtoDataTable;
use App\Http\Requests\ProdutoRequest;
use App\Models\Fabricante;
use App\Models\Produto;
use App\Services\ProdutoService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Throwable;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProdutoDataTable $produtoDataTable)
    {
        return $produtoDataTable->render('produto.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produto.form', [
            'fabricantes' => Fabricante::pluck('nome', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(ProdutoRequest $request)
    {
        $produto = ProdutoService::store($request->all());

        if ($produto) {
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
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            return Produto::findOrFail($id);
        }catch(Throwable $th){
            return response('Erro ao selecionar o produto',400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        return view('produto.form', [
            'produto' => $produto,
            'fabricantes' => Fabricante::pluck('nome', 'id')
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(ProdutoRequest $request, Produto $produto)
    {
        $prod = ProdutoService::update($request->all(), $produto);

        if ($prod) {
            flash('Produto atualizado com sucesso')->success();

            return back();
        }

        flash('Erro ao atualizar o produto')->error();

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */

    public function destroy(Produto $produto,  Request $request)
    {
        try {
            $produto->delete();
            Alert::success($request->nome, 'Excluído!!');
        } catch (Throwable $th) {
            Alert::error($request->nome, 'Erro ao Excluir');
        }
    }
    public function listaProdutos(Request $request)
    {

        return ProdutoService::listaProdutos($request->all());
    }
}
