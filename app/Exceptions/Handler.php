<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

   public function render($request, Throwable $exception)
    {
        if($exception instanceOf TokenBlacklistedException)
        {
            return response()->json(['error'=>'Token is in blocklist.'],400);
        }
        elseif($exception instanceOf TokenInvalidException)
        {
            return response()->json(['error'=>'Token is invalid.'],400);
        }

        elseif($exception instanceOf TokenExpiredException)
        {
            return response()->json(['error'=>'Token is expired.'],400);
        }

        elseif($exception instanceOf JWTException)
        {
            return response()->json(['error'=>'Problem is with your token.'],400);
        }


        return parent::render($request, $exception);
    }
}
