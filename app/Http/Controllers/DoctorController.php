<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\Utils;

class DoctorController extends Controller
{
    public function index(){
        return view('cita.index');
    }

    public function atender(){
        return view('cita.atender');
    }
}
