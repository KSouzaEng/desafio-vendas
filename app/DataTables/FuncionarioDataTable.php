<?php

namespace App\DataTables;

use App\Models\Produto;
use Collective\Html\FormFacade;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class FuncionarioDataTable extends DataTable{

    public function dataTable($query){

        return dataTable()
        ->eloquent($query)
        ->addColumn('action', function ($p) {
            $acoes = link_to(route('produtos.edit', $p),'Editar', ['class' => 'btn btn-sm btn-primary mr-1']);
            $acoes .= FormFacade::button('Excluir', ['class' => 'btn btn-sm btn-danger', 'onclick' => "excluir('" . route('produtos.destroy', $p) . "')"]);

            return $acoes;
        });

    }
    public function query(Fabricante $model)
    {
        return $model->newQuery();
    }

    public function html()
    {
        return $this->builder()
                    ->setTableId('funcionario-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create')
                        ->addClass('btn bg-primary')
                        ->text('<i class=fas fa-plus mr-1></i>Cadastrar Novo'),

                        Button::make('export')
                        ->addClass('btn bg-primary')
                        ->text('<i class=fas fa-plus mr-1></i>Exportar'),

                        Button::make('print')
                        ->addClass('btn bg-primary')
                        ->text('<i class=fas fa-plus mr-1></i>Imprimir')
                    );
    }

    protected function getColumns()
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->addClass('text-center'),
            Column::make('nome'),
            Column::make('email'),
            Column::make('senha')
        ];
    }

    protected function filename()
    {
        return 'Cliente_' . date('YmdHis');
    }

}
