<?php

namespace App\DataTables;

use App\Models\Lounges;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class LoungesDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                $editBtn = "<a href='" . route('lounges.edit', $query->id) . "' class='btn btn-icon btn-inverse-primary'><i class='fa-solid fa-pen-to-square'></i></a>";
                $deleteBtn = "<a href='" . route('lounges.destroy', $query->id) . "' class='btn btn-icon btn-inverse-danger mx-2 delete-item'><i class='fa-solid fa-trash-can'></i></a>";
                $moreBtn = '
                <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-inverse-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa-solid fa-gear"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item" href="' . route('lounge-gallery.index', ['lounge' => $query->id]) . '">Image Gallery</a>
                        <a class="dropdown-item" href="' . route('lounge-device-types.index', ['lounge' => $query->id]) . '">Device Types</a>
                        <a class="dropdown-item" href="' . route('device.index', ['lounge' => $query->id]) . '">Devices</a>
                    </div>
                </div>';
                return $editBtn . $deleteBtn . $moreBtn;
            })
            ->addColumn('image', function ($query) {
                if (empty(!$query->image)) {
                    $img = "<img width='250px' src='" . asset($query->image) . "'></img>";
                } else {
                    $img = "<img width='250px' src='" . url('uploads/no_image.jpg') . "'></img>";
                }
                return $img;
            })
            ->addColumn('status', function ($query) {
                if ($query->status == 'active') {
                    $button = '<div class="form-check form-switch mb-2">
								    <input type="checkbox" checked data-id="' . $query->id . '" class="form-check-input change-status" id="formSwitch1">
							    </div>';
                    return $button;
                } else {
                    $button = '<div class="form-check form-switch mb-2">
								    <input type="checkbox" data-id="' . $query->id . '" class="form-check-input change-status" id="formSwitch1">
							    </div>';
                    return $button;
                }
            })
            ->rawColumns(['image', 'action', 'status'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * 
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Lounges $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('lounges-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(0)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('image'),
            Column::make('name'),
            Column::make('agent_id'),
            Column::make('status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Lounges_' . date('YmdHis');
    }
}
