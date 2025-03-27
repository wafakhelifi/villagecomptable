<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Teacher;

class TeacherController extends Controller
{
    // Afficher la page des enseignants
    public function teachers()
    {
        $teachers = Teacher::all();
        return view('teachers', ['teachers' => $teachers]);
    }
    
    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers', compact('teachers'));
    }
}