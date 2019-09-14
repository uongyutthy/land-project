<?php
/**
 * Created by PhpStorm.
 * User: Tong Sovann
 * Date: 31 March 2019
 * Time: 11:48 AM
 */

namespace App\Http\Controllers;


use App\Traits\ConfiguresViews;
use App\Traits\StandardResponser;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Exception;


/**
 * Class Base Event Controller.
 *
 * @package namespace App\Http\Controllers;
 */
abstract class BaseEventsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, ConfiguresViews, StandardResponser;

    /**
     * @var Check Auth
     */
    protected $checkAuth = true;

    /**
     * @var Service
     */
    protected $service;

    /**
     * @var Validator
     */
    protected $validator;

    /**
     * @var Grid object
     */
    protected $grid;

    /**
     * @var Model object
     */
    protected $model;

    /**
     * @var view name without action object
     */
    protected $viewName;

    /**
     * @var grid data and filter
     */
    protected $gridData;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct($service, $grid, $model)
    {
        if($this->checkAuth){
            $this->middleware('auth');
        }

        $this->service  = $service;
        $this->grid     = $grid;
        $this->model    = $model;

        if (!empty($this->viewName)) $this->setAllViewByName($this->viewName);




        if(!isset($this->service)) throw new Exception('$service is required');
        //if(!isset($this->grid)) throw new Exception('$gird is required');
        if(!isset($this->model)) throw new Exception('$model is required');

        if(     !isset($this->indexViewName) ||
                !isset($this->editViewName) ||
                !isset($this->showViewName) ||
                !isset($this->createViewName)) throw new Exception('$view index,edit,show,create are required');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function _index()
    {
        return $this->grid->create($this->gridData)->renderOn($this->getIndexViewName());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProjectCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    protected function _store($request)
    {
        try {

            $datas = $this->service->insert($request);
            if ($request->wantsJson()) {
                return response()->json($datas['data']);
            }

            return redirect()->back()->with('message', __("global.save_success"));
        } catch (ValidationException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  $request
     * @param  $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    protected function _update($request, $id)
    {
        $data = $this->service->update($request, $id);
        if (request()->wantsJson()) {

            return response()->json([
                'message' => __("global.update_success"),
                'data' => $data,
            ]);
        }
        return redirect()->back()->with('status', __("global.update_success"));
    }


    /**
     * Display the create form resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data = $this->model;
        return view($this->getCreateViewName(), compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $data = $this->service->getById($id);
        if (request()->wantsJson()) {

            return response()->json([
                'data' => $data,
            ]);
        }

        return view($this->getShowViewName(), compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $data = $this->service->getById($id);
        return view($this->getEditViewName(), compact('data'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->service->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => __("global.delete_success"),
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('status', __("global.delete_success"));
    }


    /**
     * update state the specified resource from storage.
     *
     * @param  int $id
     *
     * @param  int $nextState
     *
     * @return \Illuminate\Http\Response
     */
    public function state($id, $nextState)
    {
        return response()->json($this->service->updateState($id, $nextState));
    }
}
