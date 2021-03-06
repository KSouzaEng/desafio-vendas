<?php

namespace App\Http\Controllers;

use App\DataTables\clienteDataTable;
use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use App\Services\ClienteService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ClienteController extends Controller
{
    public function index(ClienteDataTable $clienteDataTable)
    {
        return $clienteDataTable->render('cliente.index');
    }

    public function create()
    {
        return view('cliente.form');
    }

    public function store(ClienteRequest $request)
    {
        $cliente = ClienteService::store($request->all());

        if ($cliente) {

            Alert::success($request->nome, 'Salvo!!');

            return back();
        } else {

            Alert::error($request->nome, 'Erro ao Salvar');
        }
        return back()->withInput();
    }

    public function show(Cliente $cliente)
    {
        //
    }

    public function edit(Cliente $cliente)
    {
        return view('cliente.form', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $cliente = ClienteService::update($request->all(), $cliente);

        if ($cliente) {
            flash('Cliente atualizado com sucesso')->success();

            return back();
        }

        flash('Erro ao atualizar o cliente')->error();

        return back()->withInput();
    }

    public function destroy(Cliente $cliente,Request $request)
    {
        try {
            $cliente->delete();
            Alert::success($request->nome, 'Excluído!!');
        } catch (Throwable $th) {
            Alert::error($request->nome, 'Erro ao Excluir');
        }
    }
    public function listaClientes(Request $request)
    {
        return ClienteService::listaClientes($request->all());
    }
}
