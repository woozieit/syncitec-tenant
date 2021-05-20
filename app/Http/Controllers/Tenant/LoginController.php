<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\System\Tenant;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'gestion/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:customer')->except('logout');
    }

    public function showLoginForm($tenant)
    {
        $sedes = Tenant::where('subdomain', $tenant)->get();
        return Inertia::render('Tenant/Auth/Login', $sedes);
    }

    protected function guard()
    {
        return Auth::guard('customer');
    }

    protected function username()
    {
        return 'username';
    }
}
