<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use App\Traits\ApiResponseTrait;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    use ApiResponseTrait;
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (! $user instanceof Admin || ! $user->tokenCan('admin')) {
            return $this->error(null, 'Unauthorized', Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
