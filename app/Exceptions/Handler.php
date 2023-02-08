<?php

namespace App\Exceptions;

use Throwable;
use BadMethodCallException;
use App\Http\Traits\RestfulRespond;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\CssSelector\Exception\InternalErrorException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{

    use RestfulRespond;
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
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  Request  $request
     * @param  Throwable  $exception
     * @return Response
     *
     * @throws Exception|Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof NotFoundHttpException) {
            return $this->respondNotFound();
        }

        if ($exception instanceof ModelNotFoundException) {
            return $this->respondNotFound();
        }

        if ($exception instanceof BadMethodCallException) {
            return $this->respondNotFound();
        }

        if ($exception instanceof InternalErrorException) {
            return $this->respondInternalError($exception->getMessage());
        }

        if ($exception instanceof BadRequestHttpException) {
            return $this->respondBadRequest($exception->getMessage());
        }

        if ($exception instanceof MethodNotAllowedHttpException) {
            return $this->respondMethodNotAllowed();
        }

        if ($exception instanceof UnauthorizedHttpException) {
            return $exception->getMessage() ? $this->respondNotAuthorized($exception->getMessage()) : $this->respondNotAuthorized();
        }

        if ($exception instanceof AuthorizationException) {
            return $exception->getMessage() ? $this->respondForbidden($exception->getMessage()) : $this->respondForbidden();
        }

        if ($exception instanceof QueryException) {
            if ($exception->errorInfo[1] == 1062) {
                return $this->respondBadRequest('Unique Constraint Violated!', $message_ar = 'تم انتهاك قيد التفرد!');
            }
        }

        return parent::render($request, $exception);
    }
}
