<?php

namespace App\Http\Controllers;
use App\DataTables\FuncionarioDataTable;

use Illuminate\Http\Request;

class FuncionarioController extends Controller
{

    public function index (FuncionarioDataTable $funcionarioDataTable) {

        return $funcionarioDataTable->render('funcionario.index');
    }
}
