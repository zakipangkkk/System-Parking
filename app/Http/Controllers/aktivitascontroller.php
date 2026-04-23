<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\logaktivitas;

class AktivitasController extends Controller
{
public function index()
{
    logAktivitas('User membuka dashboard');

    return view('home');
}

}
