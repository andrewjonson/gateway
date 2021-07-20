<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use App\Traits\ResponseTrait;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Access\AuthorizationException;

class JwtMiddleware
{
    use ResponseTrait;
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            if( !$user ) throw new AuthenticationException;
            if ($user->deleted_at) {
                if (! $user->auth_status) {
                    throw new AuthorizationException;
                }
                $user->update([
                    'auth_status' => false
                ]);
                auth()->invalidate();
                return $this->failedResponse('You have been deleted', 403);
            }
        } catch (Exception $e) {
            return response()->json([
                'type' => 2,
                'message' => 'Unauthenticated'
            ], 401);
        }

        return $next($request);
    }
}
