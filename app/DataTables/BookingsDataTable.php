<?php

namespace App\DataTables;

use App\Models\Booking;
use App\Models\Bookings;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BookingsDataTable extends DataTable
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
                $deleteBtn = "<a href='" . route('bookings.destroy', $query->id) . "' class='btn btn-icon btn-inverse-danger mx-2 delete-item'><i class='fa-solid fa-trash-can'></i></a>";

                return $deleteBtn;
            })
            ->addColumn('status', function ($query) {
                if ($query->booking_status == 'accepted') {
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
            ->addColumn('total_price', function ($query) {
                return $query->total_price . " JD";
            })
            ->addColumn('lounge', function ($query) {
                return $query->lounges->name;
            })
            ->addColumn('user', function ($query) {
                return $query->user->name;
            })
            ->addColumn('device_type', function ($query) {
                return $query->deviceType->type;
            })
            ->addColumn('device', function ($query) {
                $img = "<img width='250px' src='" . asset($query->device->image) . "'></img>";
                return $img;
            })
            ->rawColumns(['action', 'status', 'total_price', 'device'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Booking $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Bookings $model): QueryBuilder
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
            ->setTableId('bookings-table')
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
            Column::make('user'),
            Column::make('device'),
            Column::make('lounge'),
            Column::make('device_type'),
            Column::make('start_time'),
            Column::make('end_time'),
            Column::make('total_price'),
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
        return 'Bookings_' . date('YmdHis');
    }
}
