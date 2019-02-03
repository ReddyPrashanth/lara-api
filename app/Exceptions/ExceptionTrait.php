<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;

trait ExceptionTrait {
    public function apiException($request, $exception){
        if($this->isModel($exception)){
            return $this->ModelResponse();
        }

        if($this->isHttp($exception)){
            return $this->HttpResponse();
        }
    }

    public function isModel($exception){
        return $exception instanceof ModelNotFoundException;
    }

    public function isHttp($exception){
        return $exception instanceof NotFoundHttpException;
    }

    public function ModelResponse() {
        return response()->json([
            "error" => "Model Not Found"
        ], Response::HTTP_NOT_FOUND);
    }

    public function HttpResponse() {
        return response()->json([
            "error" => "Route Not Found"
        ], Response::HTTP_NOT_FOUND);
    }
}
