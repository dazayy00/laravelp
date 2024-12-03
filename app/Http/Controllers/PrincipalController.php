<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function inicio()
    {
        return view('inicio');
    }

    public function nosotros()
    {
        return view('nosotros');
    }
    public function servicios()
    {
        return view('servicios');
    }
    public function citas()
    {
        return view('citas');
    }
    public function mascotas()
    {
        return view('mascotas');
    }
}