<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2/11/2019
 * Time: 12:26 AM
 */

namespace App\Helpers\Breadcrumbs;


use Illuminate\Http\Request;

class Segment
{

	protected $request;

	protected $segment;

	public function __construct(Request $request, $segment)
	{
		$this->request = $request;
		$this->segment = $segment;
	}

	public function name(){
		return title_case(str_replace('_', ' ', $this->segment));
	}

	public function model(){
		return collect($this->request->route()->parameters())->where('id', $this->segment)->first();
	}

	public function url(){
		return url(implode(array_slice($this->request->segments(), 0, $this->position() + 1), '/'));
	}

	public function position(){
		return array_search($this->segment, $this->request->segments());
	}
}