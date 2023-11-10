<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboardIndex()
    {
        $user = auth()->user();
        return view('dashboard', [
            'user' => $user,
        ]);
    }
}
