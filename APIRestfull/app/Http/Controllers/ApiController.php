<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Routing\middleware;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class ApiController extends Controller
{
    use ApiResponse;

  
}
