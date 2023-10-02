<?php

namespace App\DataTables;

use App\Models\Device;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DeviceDataTable extends DataTable
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
                $editBtn = "<a href='" . route('device.edit', $query->id) . "' class='btn btn-icon btn-inverse-primary'><i class='fa-solid fa-pen-to-square'></i></a>";
                $deleteBtn = "<a href='" . route('device.destroy', $query->id) . "' class='btn btn-icon btn-inverse-danger mx-2 delete-item'><i class='fa-solid fa-trash-can'></i></a>";

                return $editBtn . $deleteBtn;
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
                if ($query->status == 1) {
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
            ->addColumn('vip_room', function ($query) {
                if ($query->vip_room == 1) {
                    $button = '<span class="badge bg-success">YES</span>';
                    return $button;
                } else {
                    $button = '<span class="badge bg-danger">NO</span>';
                    return $button;
                }
            })
            ->addColumn('lounge', function ($query) {
                return $query->lounge->name;
            })
            ->addColumn('device_type', function ($query) {
                return $query->deviceType->type;
            })
            ->rawColumns(['image', 'action', 'status', 'vip_room'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Device $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Device $model): QueryBuilder
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
            ->setTableId('device-table')
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
            Column::make('lounge'),
            Column::make('device_type'),
            Column::make('vip_room'),
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
        return 'Device_' . date('YmdHis');
    }
}
