<?php

namespace App\DataTables;

use App\Models\Docente;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Options\Plugins\SearchPanes;
use Yajra\DataTables\Html\SearchPane;
use Yajra\DataTables\Services\DataTable;

class DocentesDataTable extends DataTable
{

    public function dataTable($query)
    {
        /* $docentes = Docente::query()->select('suplente as value', 'suplente as label')->get(); */

        $suplentes = [
            [
                'value' => 1,
                'label' => 'Suplente'
            ],
            [
                'value' => 0,
                'label' => 'No Suplente'
            ],
            ];

        return datatables()
            ->eloquent($query)
            ->setRowId('id')
            ->searchPane('suplente', $suplentes)
    ;}

    /**
     * Get the query source of dataTable.
     */
    public function query(Docente $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
/*                     ->parameters([
                        'layout' => [
                            'topStart' => 'info',
                            'topEnd' => 'search',
                            'bottomStart' => 'pageLength',
                            'bottomEnd' => 'paging',
                        ]
                    ]) */
                    ->setTableId('docentes-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload'),
                        Button::make('searchPanes')
                    ])
                    ->addColumnDef([
                        'targets' => '_all',
                        'searchPanes' => SearchPane::make()->hideCount()
                    ])
    ;}


    public function getColumns(): array
    {
        return [
            Column::make('id')->searchPanes(false),
            Column::make('name')->searchPanes(false),
            Column::make('email')->searchPanes(false),
            Column::make('suplente')
        ];
    }


    protected function filename(): string
    {
        return 'Docentes_'.date('YmdHis');
    }
}
