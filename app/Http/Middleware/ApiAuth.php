<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Hash;

class ApiAuth extends Authenticate
{
    public function handle($request, Closure $next, $guard = null, $class = 'App\Client', $auth = 'bearer')
    {
        if ($auth === 'bearer') {
            $model = forward_static_call([$class, 'where'], 'api_token', $request->bearerToken())->first();
            if (!$model || !$model->isTokenValid()) {
                return $this->handleUnauthorizedRequest($request);
            }
        } else {
            $model = forward_static_call([$class, 'where'], 'login', $request->getUser())->first();
            if (!Hash::check($request->getPassword(), $model->password)) {
                return $this->handleUnauthorizedRequest($request);
            }
        }
        return $next($request);
    }
}
