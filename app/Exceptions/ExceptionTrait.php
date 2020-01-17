<?php 

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;


trait ExceptionTrait{

	public function apiException($request, $exception){

		if ($this->isModel($exception)) {
                return response()->json([
                    'errors'=> 'product model not found'
                ], Response::HTTP_NOT_FOUND);
            }

        if ($this->isRoute($exception)) {
            return response()->json([
                'errors'=> 'incorrect route'
            ], Response::HTTP_NOT_FOUND);
        } 

        return parent::render($request, $exception);
	}

	public function isModel($e){
		return $e instanceof ModelNotFoundException;
	}

	public function isRoute($e){
		return $e instanceof NotFoundHttpException;
	}
}