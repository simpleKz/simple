<?php

namespace App\Http\Middleware;

use App\Exceptions\Api\ApiServiceException;
use App\Exceptions\WebServiceErroredException;
use App\Http\Errors\ErrorCode;
use Closure;

class RoleOrMiddleware
{

    public function handle($request, Closure $next, ...$roleIds)
    {
        if (in_array(auth()->user()->role_id, $roleIds)) {
            return $next($request);
        } else {
            if (request()->is('api/*')) {
                throw new ApiServiceException(403, false, [
                    'errors' => [
                        'Access denied : wrong role'
                    ],
                    'errorCode' => ErrorCode::FORBIDDEN
                ]);
            } else {
                throw new WebServiceErroredException('Нет доступа!');
            }
        }
    }
}
