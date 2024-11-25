<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Gallery;
use App\Models\Information;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $agendas = Agenda::latest('date')->take(6)->get();
        $galleries = Gallery::latest()->take(8)->get();
        $informations = Information::latest()->take(6)->get();

        return view('welcome', compact('agendas', 'galleries', 'informations'));
    }
} 