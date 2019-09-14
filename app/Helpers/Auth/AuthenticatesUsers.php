<?php

namespace App\Helpers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

trait AuthenticatesUsers
{
	use \Illuminate\Foundation\Auth\AuthenticatesUsers;


	/**
	 * Get the login username to be used by the controller.
	 *
	 * @return string
	 */
	public function username()
	{

		return 'username';
	}

}
