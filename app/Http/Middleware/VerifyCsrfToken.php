<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'api/*',
        'auth/*'
    ];

    public function handle($request, Closure $next)
    {
        if (!$request->isMethod('get')) {
            Log::info('CSRF token:', [$request->header('X-XSRF-TOKEN')]);
            Log::info('Session token:', [session()->token()]);
        }
        return parent::handle($request, $next);
}

}
