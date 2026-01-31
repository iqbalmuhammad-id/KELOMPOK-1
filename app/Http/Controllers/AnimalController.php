<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index(Request $request)
    {
        $letter = $request->get('letter', 'A');

        $animals = Animal::where('name', 'LIKE', $letter . '%')->get();

        return view('hewan.index', compact('animals', 'letter'));
    }
}