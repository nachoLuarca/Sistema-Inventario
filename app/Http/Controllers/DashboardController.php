<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Constructor para aplicar middleware de autenticación
     */
    public function __construct()
    {
        $this->middleware('auth'); // solo usuarios logueados podrán acceder
    }

    /**
     * Muestra el panel principal (dashboard)
     */
    public function index()
    {
        return view('dashboard');
    }
}
