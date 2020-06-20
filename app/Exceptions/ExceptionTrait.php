<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Throwable;
use Symfony\Component\HttpFoundation\Response;

trait Exceptiontrait
{

    public function apiException($request, $e)
    {
        if ($this->ismodel($e)) {

            return $this->ModelResponse();
        }
        if ($this->isurl($e)) {

            return $this->HttpResponse();
        }
        dd($e);
    }


    protected function ismodel($e)
    {
        return $e instanceof ModelNotFoundException;
        # code...
    }
    protected function isurl($e)
    {
        return $e instanceof NotFoundHttpException;
        # code...
    }
    protected function ModelResponse()
    {
        return response()->json([
            'errors' => 'Product Model not found'
        ], Response::HTTP_NOT_FOUND);
    }

    protected function HttpResponse()
    {
        return response()->json([
            'errors' => 'Incorect route'
        ], Response::HTTP_NOT_FOUND);
    }
}
