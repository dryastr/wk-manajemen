<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (Auth::check()) {
            $user = Auth::user();
            switch ($user->role->name) {
                case 'super_admin':
                    return redirect()->route('super_admin.dashboard');
                case 'admin':
                    return redirect()->route('admin.dashboard');
                case 'admin_keuangan':
                    return redirect()->route('admin_keuangan.dashboard');
                case 'admin_perpustakaan':
                    return redirect()->route('admin_perpustakaan.dashboard');
                case 'kaprog':
                    return redirect()->route('kaprog.dashboard');
                case 'pemray':
                    return redirect()->route('pemray.dashboard');
                default:
                    return redirect()->route('home');
            }
        }

        return $next($request);
    }
}
