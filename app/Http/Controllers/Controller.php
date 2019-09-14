<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $checkAuth = true;

    /**
     * @var Service
     */
//    protected $service;

    /**
     * @var Validator
     */
//    protected $validator;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(/*$service, $validator*/)
    {
        if($this->checkAuth){
            $this->middleware('auth');
        }

//        $this->service = $service;
//        $this->validator = $validator;
    }

}
