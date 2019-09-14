<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2/11/2019
 * Time: 12:26 AM
 */

namespace App\Helpers\Breadcrumbs;


use Illuminate\Http\Request;

class Breadcrumbs
{

	protected $request;

	public function __construct(Request $request)
	{
		$this->request = $request;
	}

	public function segments()
	{
		return collect($this->request->segments())->map(function ($segment){
			return new Segment($this->request, $segment);
		})->toArray();
	}
}