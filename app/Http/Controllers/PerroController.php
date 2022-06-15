<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerroController extends Controller
{
    public function index(){
        return view('perro.index');
    }
}
