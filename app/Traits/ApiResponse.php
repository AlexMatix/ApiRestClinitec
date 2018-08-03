<?php 
	
namespace App\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\response;

	trait ApiResponse{

		private function succesResponse($data, $code = 200){
			return response()->json($data, $code);
		}

		protected function succesMessaje($mensaje, $code = 200){
			
			return response()->json(['success' => $mensaje], $code);
		}

		protected function errorResponse($mensaje, $code = 404){

			return response()->json(['error' => $mensaje, 'code' => $code], $code);
		}

		protected function showAll(Collection $collection, $code = 200){
			return response()->json($collection, $code);
		}

		protected function showList($List, $code = 200){
			return response()->json($List, $code);
		}

		protected function showOne(Model $instance, $code = 200){
			return response()->json($instance, $code);
		}
	}
