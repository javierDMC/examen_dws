<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->renderable(function (Throwable $exception) {
            if (request()->is('api*')) {
                if ($exception instanceof ModelNotFoundException) {
                    return response()->json(['error' => 'Recurso no encontrado'], 404);
                }
                else if($exception instanceof NotFoundHttpException) {
                    return response()->json(['error' => 'Recurso no encontrado'], 404);
                }
                //este con el isset va delante del ValidationException
                else if (isset($exception))
                    return response()->json(['error' => 'Error: ' . $exception->getMessage()], 500);
                else if ($exception instanceof ValidationException)
                    return response()->json(['error' => 'Datos no válidos'], 400);
                else if ($exception instanceof AuthenticationException) {
                    return response()->json(['error' => 'Usuario no autenticado'], 401);
                }

            }
        });
    }
}
