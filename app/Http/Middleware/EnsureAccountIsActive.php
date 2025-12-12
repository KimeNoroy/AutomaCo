<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureAccountIsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (!$user || !$user->is_active) {
            return response()->json([
                'message' => 'Su cuenta no está activada. Por favor, active su cuenta con un código de activación antes de continuar.',
                'error' => 'account_not_activated'
            ], 403);
        }

        return $next($request);
    }
}
