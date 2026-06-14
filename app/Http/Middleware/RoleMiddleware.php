<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string ...$roles)
    {
        if (!$request->user() || !in_array($request->user()->role, $roles)) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            if ($request->is('admin/*') || $request->is('admin')) {
                return redirect()->route('admin.login')->withErrors(['email' => 'Please login as admin.']);
            }
            if ($request->is('mua/*') || $request->is('mua')) {
                return redirect()->route('mua.login')->withErrors(['email' => 'Please login as MUA.']);
            }
            return redirect()->route('login');
        }

        return $next($request);
    }
}
