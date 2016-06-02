<?php
/**
 * Created by PhpStorm.
 * User: suki
 * Date: 02/Jun/2016
 * Time: 22:09
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ApiMiddleware {

    public function handle($request, Closure $next) {
        return Auth::onceBasic('email') ?: $next($request);
    }
}