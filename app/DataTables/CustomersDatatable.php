<?php

namespace App\DataTables;

use App\Models\Customer;
use Yajra\Datatables\Services\DataTable;

class CustomersDatatable extends DataTable
{
    // protected $printPreview  = 'path.to.print.preview.view';

    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'customers.partials._table-actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $customers = Customer::select();

        return $this->applyScopes($customers);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->ajax('')
                    ->addAction(['width' => '80px'])
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'company_name',
            [
                'data'  => 'person.name',
                'name'  => 'person.name',
                'title' => 'Name',
            ],
            [
                'data'  => 'person.phone',
                'name'  => 'person.phone',
                'title' => 'Phone',
            ],
            [
                'data'  => 'person.address',
                'name'  => 'person.address',
                'title' => 'Address',
            ],
            'courier',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'customers';
    }
}
