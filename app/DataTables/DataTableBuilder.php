<?php


namespace App\DataTables;

use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Html\Column;

class DataTableBuilder extends Builder
{
    public function addIndex(array $attributes = [])
    {
        $indexColumn = $this->config->get('datatables.index_column', 'DT_RowIndex');

        $attributes = array_merge([
            'defaultContent' => '',
            'data' => $indexColumn,
            'name' => $indexColumn,
            'title' => '',
            'render' => null,
            'orderable' => false,
            'searchable' => false,
            'exportable' => false,
            'printable' => true,
            'footer' => '',
        ], $attributes);

        $this->collection->prepend(new Column($attributes));

        return $this;
    }
}