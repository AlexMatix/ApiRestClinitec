<?php

namespace App\Http\Controllers;

use App\Traits\ApiMail;
use App\Traits\ApiResponse;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Routing\middleware;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class ApiController extends Controller
{
    use ApiResponse;
    use ApiMail;

	public function __construct(){
		$this->middleware('auth:api');
	}

	public function isValidData($data){
		foreach ($data as $value) {
			$value = (array) $value;
			if(empty($value['id']))
				return false;
			else
				return true;
		}
	}
	
}
