<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function __construct()
    {

    }

    public function showLoginForm()
    {
        return Inertia::render('System/Auth/Login');
    }
}
