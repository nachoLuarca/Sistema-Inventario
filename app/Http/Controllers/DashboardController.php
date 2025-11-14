<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Constructor:
     * Asegura que solo usuarios autenticados accedan al dashboard.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Muestra el panel principal del sistema.
     */
    public function index()
    {
        return view('dashboard');
    }
}
