<?php

namespace App\Http\Middleware;

use Closure;
use App\models;
use Illuminate\Support\Facades\Auth;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected $model;

    public function __construct()
    {
        $this->model = new models();
    }
    public function handle($request, Closure $next)
    {
        if (Auth::user()->previleges != '1') {
            return redirect('/dashboard')
                ->with(['status' => 'Anda tidak punya akses sebagai Administrator.']);
        }
        return $next($request);
    }
}
