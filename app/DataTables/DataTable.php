<?php


namespace App\DataTables;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

abstract class DataTable
{
    protected $indexColumn = TRUE;
    protected $actionColumn = TRUE;

    /**
     * DataTable data source
     *
     * @return Builder|Collection|\Illuminate\Database\Query\Builder
     */
    abstract function dataSource();

    /**
     * DataTable columns
     *
     * @return array
     */
    abstract function columns();

    /**
     * DataTable options
     *
     * @return array
     */
    public function options() {
        return [];
    }

    /**
     * Action buttons
     *
     * @return array
     */
    public function actions() {
        return [];
    }

    /**
     * Get DataTable Builder
     *
     * @return DataTableBuilder
     */
    protected function getBuilder() {
        return app()->make(DataTableBuilder::class);
    }

    /**
     * Render DataTable
     *
     * @param string $viewName
     * @param array|NULL $viewData
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function render(string $viewName, array $viewData = NULL) {
        $viewData = empty($viewData) ? [] : $viewData;

        // Ajax request
        if (request()->ajax()) {
            return DataTables::of($this->dataSource())
                ->addIndexColumn()
                ->toJson();
        }

        // Options and columns
        $options = array_merge($this->getDefaultOptions(), $this->options());
        $dataTable = $this->getBuilder()
            ->parameters($options)
            ->columns($this->columns());

        // Index column
        if ($this->indexColumn) {
            $dataTable->addIndex([
                'className' => 'text-nowrap align-middle',
                'title' => __('global.n.o.'),
                'width' => '30px'
            ]);
        }

        // Action column
        $actions = $this->generateActionHTML();
        if ($this->actionColumn && count($actions) > 0) {
            $dataTable->addAction([
                'className' => 'text-right text-nowrap align-middle action',
                'title' => '',
                'defaultContent' => implode($actions, ''),
                'width' => '5%'
            ]);
        }

        $viewData['dataTable'] = $dataTable;
        return view($viewName, $viewData);
    }

    /**
     * Generate Action buttons
     *
     * @return array
     * @throws \Throwable
     */
    private function generateActionHTML() {
        $html = [];
        $customActions = $this->actions();
        $actions = array_replace_recursive($this->getDefaultActions(), $customActions);

        // Sort actions
        $actions = collect($actions)->sortBy(function ($item) { return !empty($item['order']) ? $item['order'] : 1; });

        foreach ($actions as $type => $action) {
            if (!isset($action['permission']) || !Auth::user()->can($action['permission'])) continue;
            if (!isset($customActions[$type]) || (isset($customActions[$type]) && $customActions[$type] !== false)) {
                $routeParams = [];
                $route = '';
                $className = isset($action['className']) ? $action['className'] : '';

                if (!empty($action['route']) && is_array($action['route'])) {
                    if (!empty($action['route']['parameters'])) {
                        $params = (array)$action['route']['parameters'];
                        $routeParams = collect($params)->map(function ($item) {
                            return "%$item%";
                        })->toArray();
                    }

                    if (!empty($action['route']['name'])) {
                        $route = route($action['route']['name'], $routeParams);
                    }
                }

                $html[] = view($action['view'], compact('route', 'className'))->render();
            }
        }

        return $html;
    }

    /**
     * Get default options
     *
     * @return array
     * @throws \Throwable
     */
    private function getDefaultOptions() {
        $params = [
            'autoWidth' => false,
            'columnDefs' => [
                [
                    'targets' => '_all',
                    'className' => 'align-middle'
                ]
            ],

            // Callbacks
            'createdRow' => view('vendor.datatables.actions.script')->render(),
        ];

        if ($this->indexColumn) {
            $params['order'] = [[ 1, 'asc' ]];
        }

        return $params;
    }

    /**
     * Get default action buttons
     *
     * @return array
     */
    private function getDefaultActions() {
        return [
            'view' => [
                'view' => 'vendor.datatables.actions.view'
            ],
            'edit' => [
                'view' => 'vendor.datatables.actions.edit'
            ],
            'delete' => [
                'view' => 'vendor.datatables.actions.delete'
            ]
        ];
    }
}
