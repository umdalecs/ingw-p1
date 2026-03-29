<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PersonasController extends Controller
{
    public function listPersonas(): View {
        return view("personas.list");
    }

    public function createPersona(): View {
        return view("personas.new");
    }
}
